<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function storeCashier(Request $request)
    {
        try {
            // Validasi data input
            $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $validatedData = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password), 
                'role' => 'cashier',
            ];

            $cashier = User::create($validatedData);

            return redirect()->route('view-cashier')->with('create_success', 'Cashier registered successfully.');
        } catch (\Exception $e) {
            return redirect()->route('view-cashier')->with('create_failed', 'Failed to register cashier. Error: ' . $e->getMessage());
        }
    }

    public function updateCashier(Request $request, $id)
    {
        try {
            $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id, 
                'password' => 'nullable|string|min:8|confirmed', 
            ]);
    
            $cashier = User::findOrFail($id);
    
            $cashier->fullname = $request->fullname;
            $cashier->email = $request->email;
    
            if ($request->password) {
                $cashier->password = Hash::make($request->password);
            }
    
            $cashier->save(); 
    
            return redirect()->route('view-cashier')->with('edit_success', 'Cashier updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('view-cashier')->with('edit_failed', 'Failed to update cashier. Error: ' . $e->getMessage());
        }
    }

    public function deleteCashier($id)
    {
        try {
            $cashier = User::findOrFail($id);

            $cashier->delete();
    
            return redirect()->route('view-cashier')->with('delete_success', 'Cashier deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('view-cashier')->with('delete_failed', 'Failed to delete cashier. Error: ' . $e->getMessage());
        }
    }
       

}
