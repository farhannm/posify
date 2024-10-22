<x-base-layout title="Reset Password">
    <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full max-w-lg p-6">
            <img class="=w-full x-show=!$store.global.isDarkModeEnabled" 
                src="{{ asset('images/illustrations/resetPassword.svg') }}" alt="Reset Password" />
            <img class="w-full x-show=$store.global.isDarkModeEnabled" 
                src="{{ asset('images/illustrations/resetPassword-dark.svg') }}" alt="Reset Password Dark Mode" />
        </div>
    </div>

    <main class="flex we-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center">
                <img  class="mx-auto h-16 w-16 lg:hidden" src="{{ asset('images/logo.png') }}" alt="logo" />
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">Reset Password</h2>
                    <p class="text-slate-400 dark:text-navy-300">Masukkan password baru untuk akun kamu</p>
                </div>
        </div>

        <form class="mt-8" action="{{ route('forgotPassword') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="password" class="block text-sm text-slate-700 dark:text-navy-200">
                    Password Baru
                </label>
                <input  type="password" name="password" id="password" required
                    class="form-input mt-1 block w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Password Baru" />
                @error('passeword')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 dark:text-navy-200">
                    Konfirmasi Password
                </label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="form-input mt-1 block w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Konfirmasi password baru" />
                @error('password_confirmation')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="btn mt-6 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                Simpan Password Baru
            </button>
        </form>
    </main>

</x-base-layout>
