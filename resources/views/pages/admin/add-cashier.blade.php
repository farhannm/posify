<x-app-layout title="Add Cashier" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <!-- Notification -->
        <div id="create_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Cashier created successfully.
        </div>
        <div id="create_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to create cashier.
        </div>


        @if(session('create_success'))
            showNotification('create_success');
        @elseif(session('create_failed'))
            showNotification('create_failed');
        @endif

        <script>
            function showNotification(id) {
                document.getElementById(id).classList.remove('hidden');
                setTimeout(function() {
                    document.getElementById(id).classList.add('hidden');
                }, 3000); 
        </script>

        <div class="mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <a class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl" href="{{ route('adminDashboardView') }}">
                    Posify
                </a>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary hover:underline" href="{{ route('view-cashier') }}">Products</a> 
                    </li>
                </ul>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary hover:underline" href="{{ route('add-cashier-form') }}">Add Cashier</a> 
                    </li>
                </ul>
            </div>
        </div>

        <form action="{{ route('cashier-store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
        
            @if ($errors->has('error'))
                <div class="alert flex space-x-2 rounded-lg border border-error px-1 py-1 text-error text-tiny+ mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif
        
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6" x-data="{ step: 1 }">
        
                <!-- Form Content -->
                <div class="col-span-12">
                    <div class="card">
                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                            <div class="flex items-center space-x-2">
                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                    <i class='bx bx-message-square-add text-xl'></i>
                                </div>
                                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                    Add Cashier
                                </h4>
                            </div>
                        </div>
                        <div class="space-y-4 p-4 sm:p-5">
                            <div x-show="step === 1">
                                <div class="space-y-4 p-4 sm:p-5">
                                    <label class="block">
                                        <span>Full Name</span><span class="text-red-500">*</span>
                                        <input
                                            name="fullname"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter fullname..." type="text" required />
                                    </label>
                                    <label class="block">
                                        <span>Email</span><span class="text-red-500">*</span>
                                        <input
                                            name="email"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter email..." type="email" required />
                                    </label>
                                    <label class="block relative">
                                        <span>Password</span><span class="text-red-500">*</span>
                                        <input
                                            id="password"
                                            name="password"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter password..." type="password" required
                                            oninput="validatePasswordMatch()" />
                                        <button
                                            type="button"
                                            class="absolute mt-6 inset-y-0 right-3 flex items-center text-gray-500"
                                            onclick="togglePassword('password')">
                                            <i id="togglePasswordIcon" class="fas fa-eye"></i>
                                        </button>
                                    </label>
                                    <label class="block relative">
                                        <span>Confirm Password</span><span class="text-red-500">*</span>
                                        <input
                                            id="confirmPassword"
                                            name="password_confirmation"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Confirm password..." type="password" required
                                            oninput="validatePasswordMatch()" />
                                        <button
                                            type="button"
                                            class="absolute mt-6 inset-y-0 right-3 flex items-center text-gray-500"
                                            onclick="togglePassword('confirmPassword')">
                                            <i id="toggleConfirmPasswordIcon" class="fas fa-eye"></i>
                                        </button>
                                    </label>
                                    <p id="passwordMatchMessage" class="text-sm mt-1"></p>
                                </div>
                            </div>
    
                            <button type="submit" class="btn ml-5 btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary/20">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>       
        
        <script>
            function togglePassword(inputId) {
                const passwordInput = document.getElementById(inputId);
                const icon = passwordInput.nextElementSibling.querySelector("i");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }

            function validatePasswordMatch() {
                const password = document.getElementById("password").value;
                const confirmPassword = document.getElementById("confirmPassword").value;
                const confirmPasswordInput = document.getElementById("confirmPassword");
                const message = document.getElementById("passwordMatchMessage");

                if (confirmPassword === "") {
                    confirmPasswordInput.style.borderColor = "#d1d5db"; // Default border color
                    message.textContent = "";
                } else if (password === confirmPassword) {
                    confirmPasswordInput.style.borderColor = "green";
                    message.textContent = "Passwords match!";
                    message.style.color = "green";
                } else {
                    confirmPasswordInput.style.borderColor = "red";
                    message.textContent = "Passwords do not match!";
                    message.style.color = "red";
                }
            }
        </script>
    </main>
</x-app-layout>