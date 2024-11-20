<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{

    public function forgotPasswordView() {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {


        $customMessage = [
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'email.exists'      => 'Email tidak terdaftar',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $customMessage);

        $sudahRequest = PasswordResetToken::where('email', $request->email)->where('created_at', '>', now()->subMinutes(5))->first();


        if ($sudahRequest) {
            return redirect()->back()->with('failed', 'Anda sudah melakukan permintaan reset password. Silahkan periksa email Anda atau coba lagi setelah 5 menit');
        }

        PasswordResetToken::where('email', $request->email)->delete();

        $token = Str::random(60);
        $expiresAt = now()->addMinutes(5);

        PasswordResetToken::create([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
                'expires_at' => $expiresAt,
            ]);

            Mail::to($request->email)->send(new ResetPasswordMail($token));


        
            return redirect()->back()->with('success', 'Kami telah mengirim link reset password ke email anda.');
    }

    
    public function validateForgotPasswordView(Request $request, $token) {
        
        $getToken = PasswordResetToken::where('token', $token)->first();

        if(!$getToken || $getToken->expires_at < now()) {
            return redirect()->route('login')->with('failed', 'Token tidak valid atau sudah kadaluarsa');
        }

        return view('auth.validate-token', compact('token'));
    }

    public function validateForgotPassword (Request $request) {
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password'  => 'required|confirmed|min:8'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token || $token->expires_at < now()) {
            return redirect()->route('login')->with('failed', 'Token tidak valid atau sudah kadaluarsa');
        }

        $user = User::where('email', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);


        PasswordResetToken::where('token', $token->token)->delete();

        return redirect()->route('login')->with('success', 'Password berhasil diganti');

    }


    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role == 'owner') {
                return redirect()->route('ownerDashboardView');
            } else if($user->role == 'admin'){
                return redirect()->route('view-products');
            } else {
                return redirect()->route('cashierDashboardView');
            }
        } else {
            $validator->errors()->add('password', 'The password does not match with username');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }


    public function registerView(){
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $validated = $validator->validated();

        $user = User::create([
            'fullname' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user', // Set default role
        ]);

        auth()->login($user);

        return redirect()->route('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
