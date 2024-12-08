<div class="main-sidebar">
    <div
        class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
        <!-- Application Logo -->
        <div class="flex pt-8">
            <img class="h-auto w-6"
                src="{{ asset('images/official_logo.png') }}" alt="logo" />
        </div>

        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                <!-- Main Sections Links -->
                <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
                    <!-- Dashboard -->
                    {{-- <a href="{{ route('adminDashboardView') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'adminDashboardView' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Dashboards'">
                        <i class='bx bxs-dashboard text-xl'></i>
                    </a> --}}

                    <!-- Products -->
                    <a href="{{ route('view-products')}}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'view-products' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Products'">
                        <i class='bx bxs-bowl-rice text-xl'></i>
                    </a>

                    <!-- Cashiers -->
                    <a href="{{ route('view-cashier') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === '' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Cashier'">
                        <i class='bx bxs-user-account text-xl'></i>
                    </a>

                </div>

                <div class="flex flex-col items-center space-y-8 py-8">
                    <!-- Profile -->
                    <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
                        <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                            <img class="rounded-full object-contain w-1 h-1" src="{{ asset('images/illustrations/penguins.svg') }}" alt="avatar" />
                            <span
                                class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                        </button>
                        <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                            <div
                                class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                                <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                                    <div>
                                        <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                            @if (Auth::check())
                                                {{ Auth::user()->fullname }}
                                            @else
                                                Guest
                                            @endif
                                        </a>
                                        <p class="text-xs text-slate-400 dark:text-navy-300">
                                            Administrator
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-col pt-2 pb-5">
                                    <div class="mt-3 px-4">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn h-9 w-full space-x-2 bg-violet-500 text-white hover:bg-violet-600 focus:bg-violet-600 active:bg-violet-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <span>Logout</span>
                                            </button>
                                        </form>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role == 'cashier')
                <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
                    <!-- Dashboard -->
                    <a href="{{ route('cashierDashboardView') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'cashierDashboardView' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Dashboards'">
                        <i class='bx bxs-dashboard text-xl'></i>
                    </a>

                    <!-- Awaiting -->
                    <a href="{{ route('viewAwaitingOrders')}}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'viewAwaitingOrders' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Awaiting Orders'">
                        <i class='bx bx-dish text-xl'></i>
                    </a>

                    <!-- In Process -->
                    <a href="{{ route('viewProcessedOrders') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'viewProcessedOrders' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'In Process'">
                        <i class='bx bxs-dish text-xl'></i>
                    </a>

                    <!-- Cancelled -->
                    {{-- <a href="{{ route('viewCancelledOrders') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'viewCancelledOrders' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'In Process'">
                        <i class='bx bx-message-alt-x text-xl'></i>
                    </a> --}}

                    <!-- History -->
                    <a href="{{ route('viewOrderHistory') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'viewOrderHistory' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Order History'">
                        <i class='bx bx-receipt text-xl'></i>
                    </a>

                </div>

                <div class="flex flex-col  space-y-8 py-8">
                    <!-- Logout -->
                    <div class="flex flex-col pt-2 pb-5">
                        <div class="mt-3 px-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="btn h-9 w-full bg-red-500 text-white hover:bg-red-600 focus:bg-red-600 active:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role == 'owner')
                <!-- Main Sections Links -->
                <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
                    <!-- Dashboard -->
                    <a href="{{ route('ownerDashboardView') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'adminDashboardView' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Dashboards'">
                        <i class='bx bxs-dashboard text-xl'></i>
                    </a>

                    <!-- Products -->
                    <a href="#"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === '' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Products'">
                        <i class='bx bxs-bowl-rice text-xl'></i>
                    </a>

                    <!-- Cashier -->
                    <a href="{{ route('view-cashier') }}"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === '' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 bg-primary/10 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' }}"
                        x-tooltip.placement.right="'Cashier'">
                        <i class='bx bxs-user-account text-xl'></i>
                    </a>

                </div>

                <div class="flex flex-col items-center space-y-8 py-8">
                    <!-- Profile -->
                    <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
                        <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                            <img class="rounded-full object-contain w-1 h-1" src="{{ asset('images/illustrations/penguins.svg') }}" alt="avatar" />
                            <span class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                        </button>
                        <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                            <div
                                class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                                <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                                    <div>
                                        <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                            @if (Auth::check())
                                                {{ Auth::user()->fullname }}
                                            @else
                                                Guest
                                            @endif
                                        </a>
                                        <p class="text-xs text-slate-400 dark:text-navy-300">
                                            Administrator
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-col pt-2 pb-5">
                                    <div class="mt-3 px-4">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn h-9 w-full space-x-2 bg-violet-500 text-white hover:bg-violet-600 focus:bg-violet-600 active:bg-violet-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <span>Logout</span>
                                            </button>
                                        </form>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <!-- Jika pengguna belum login -->
            <p>Please login to access this content.</p>
        @endif

    </div>
</div>
