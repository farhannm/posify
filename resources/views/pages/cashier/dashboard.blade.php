<x-base-layout title="POS System" is-header-blur="true">

<!-- <style>
        * {
            border: 1px solid red;
        }
</style> -->
    <!-- Sidebar -->
    <div class="sidebar print:hidden">

        <!-- Sidebar Panel -->
        <div class="sidebar-panel">
            <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
                <!-- Sidebar Panel Header -->
                <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                    <div class="flex items-center">
                        <div class="avatar mr-3 hidden h-9 w-9 lg:flex">
                            <div
                                class="is-initial rounded-full bg-secondary/10 text-secondary dark:bg-secondary-light/10 dark:text-secondary-light">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-lg font-medium tracking-wider text-slate-800 line-clamp-1 dark:text-navy-100">
                            POS
                        </p>
                    </div>
                    <button @click="$store.global.isSidebarExpanded = false"
                        class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar Panel Body -->
                <div class="flex h-[calc(100%-4.5rem)] grow flex-col">
                    <div class="is-scrollbar-hidden grow overflow-y-auto">
                        <div class="mt-2 px-4">
                            <button
                                class="btn w-full space-x-2 rounded-full border border-slate-200 py-2 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-error" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span> Lock Screen</span>
                            </button>
                        </div>

                        <div x-data="{ expanded: true }">
                            <div class="mt-4 flex items-center justify-between px-4">
                                <span class="text-xs font-medium uppercase">channels </span>
                                <div class="-mr-1.5 flex">
                                    <button
                                        class="btn h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                    <button @click="expanded =! expanded"
                                        class="btn h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                            :class="expanded && 'rotate-180'" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div x-show="expanded" x-collapse>
                                <ul class="mt-1 space-y-1.5 px-2 font-inter text-xs+ font-medium">
                                    <li>
                                        <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4.5 w-4.5 text-secondary dark:text-secondary-light"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span>Office</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-warning"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span>Main Warehouse</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-info"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span>Warehouse East</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-success"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span>Warehouse #12</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>

                        <ul class="space-y-1.5 px-2 font-inter text-xs+ font-medium">
                            <li>
                                <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">Top Deals</span>
                                </a>
                            </li>
                            <li>
                                <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">Setting</span>
                                </a>
                            </li>
                            <li>
                                <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">History</span>
                                </a>
                            </li>
                            <li>
                                <a class="group flex space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                    href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">Reports</span>
                                </a>
                            </li>
                        </ul>

                        <div class="p-4">
                            <p>Sales Today</p>
                            <p class="mt-1 text-base font-medium text-slate-700 dark:text-navy-100">
                                134.55$
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col  space-y-8 py-8">
                        <!-- Logout -->
                        <div class="flex flex-col pt-2 pb-5">
                            <div class="mt-3 px-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn h-9 w-full space-x-2 bg-red-500 text-white hover:bg-red-600 focus:bg-red-600 active:bg-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span class="text-white">Logout</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- App Header -->
    <x-app-partials.header></x-app-partials.header>

    <!-- Mobile Searchbar -->
    <x-app-partials.mobile-searchbar></x-app-partials.mobile-searchbar>

    <!-- Right Sidebar -->
    <x-app-partials.right-sidebar></x-app-partials.right-sidebar>

    <!-- Main Content Wrapper -->
    <main class="main-content pos-app w-full px-[var(--margin-x)] pb-6 transition-all duration-[.25s]">
        <div class="mt-3 grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-6 lg:col-span-8">
                <div class="swiper" x-init="$nextTick(() => $el._x_swiper = new Swiper($el, { slidesPerView: 'auto', spaceBetween: 14, navigation: { nextEl: '.next-btn', prevEl: '.prev-btn' } }))">
                    <div class="flex items-center justify-between">
                        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                            Categories
                        </p>
                        <div class="flex">
                            <button
                                class="btn prev-btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                class="btn next-btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="swiper-wrapper mt-5" x-data="{ selected: 'slide-1' }">
                        @foreach ($categories as $index => $category)
                        <div class="card swiper-slide w-24 shrink-0 cursor-pointer" @click="selected = 'slide-{{ $index + 1}}'">
                            <div class="flex flex-col items-center rounded-lg px-2 py-4"
                                :class="selected === 'slide-{{ $index + 1}}' ?
                                    'text-secondary bg-secondary/10  dark:bg-secondary-light/10 dark:text-secondary-light' :
                                    'text-slate-600 dark:text-navy-100'">
                                <img class="w-12" src="{{ asset('images/100x100.png') }}" alt="image" />
                                <h3 class="pt-2 font-medium tracking-wide line-clamp-1">
                                    {{ $category->category_name }}
                                </h3>
                            </div>
                        </div>
                        @endforeach
               
                        
                    </div>
                </div>
                
                
                <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <div class="card p-2" onclick="addToCart({{ $product->id }}, '{{$product->name}}', {{$product->price}} )" style="cursor: pointer;">
                        <div class="w-40 h-40 mx-auto flex items-center justify-center">
                            <img class="rounded-lg w-full h-full object-cover" src="{{ $product->image }}" alt="image" />
                        </div>                            <div class="pt-2">
                                <p class="font-medium text-slate-700 dark:text-navy-100">{{ $product->name }}</p>
                                <p class="text-xs text-slate-400 dark:text-navy-300">{{ $product->description }}</p>
                                <p class="text-right font-medium text-primary dark:text-accent-light">
                                    {{ 'Rp ' . number_format($product->price, 2) }}
                                </p>
                            </div>
                        </div>
                    @endforeach

               
                </div>
            </div>
            <div class="hidden sm:col-span-6 sm:block lg:col-span-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-1">
                        <p>
                            <span class="text-base font-medium text-slate-700 dark:text-navy-100">Draft</span>
                            <span>#001</span>
                        </p>

                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                            class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div
                                    class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Draft
                                                #001</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Draft
                                                #002</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Draft
                                                #005</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-1">
                        <button
                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                        <button
                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 hover:text-error focus:bg-slate-300/20 focus:text-error active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                            onclick="clearCart()">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                            class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div
                                    class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                Action</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5 p-4 sm:p-5">
                    <div class="cart-items bg-slate-50">

                        
                        
                    </div> 
                    
                    <div class="my-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="space-y-2 font-inter">
                        <div class="flex justify-between text-slate-600 dark:text-navy-100">
                            <p>Subtotal</p>
                            <p class="font-medium tracking-wide">55.00$</p>
                        </div>
                        <div class="flex justify-between text-xs+">
                            <p>Tax</p>
                            <p class="font-medium tracking-wide">5.00$</p>
                        </div>
                        <div class="flex justify-between text-base font-medium text-primary dark:text-accent-light">
                            <p>Total</p>
                            <p>60.00$</p>
                        </div>
                    </div>
                    <script>
                        export default {
                            data() {
                                return {
                                    clicked : 'slide-1' 
                                }
                            }
                        }
                    </script>
                    <div class="mt-5 grid grid-cols-2 gap-4 text-center" x-data="{ clicked : 'slide-1' }">
                        <button class="rounded-lg border border-slate-200 p-3 w-50 dark:border-navy-500 cursor-pointer" @click="clicked = 'slide-2'"
                        :class="clicked === 'slide-2' ?
                        'text-white bg-primary dark:bg-primary-light dark:text-primary-light' :
                        'text-slate-600 dark:text-navy-100'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-9 w-9" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="mt-1 font-medium dark:text-accent-light focus:text-white" @click="clicked = 'slide'"
                            :class="clicked ==='slide-2' ?
                            'text-white' : 'text-primary'">
                                Cash
                            </span>
                        </button>
                        <button class="rounded-lg border border-slate-200 p-3 w-50 dark:border-navy-500 cursor-pointer" @click="clicked = 'slide-3'"
                        :class="clicked === 'slide-3' ?
                        'text-white bg-primary dark:bg-primary-light dark:text-primary-light' :
                        'text-slate-600 dark:text-navy-100'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-9 w-9" fill="none"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span class="mt-1 font-medium dark:text-accent-light"
                            @click="clicked = 'slide-3'"
                            :class="clicked === 'slide-3' ?
                            'text-white' : 'text-primary'">
                                E-Money
                            </span>
                        </button>
                    </div>
                    <button onclick="saveOrderItemToDatabase()">Simpan Keranjang</button>
                    <button
                        class="btn mt-5 h-11 justify-between bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                        onclick="checkout()">
                        <span>Checkout</span>
                        <span>$88.00</span>
                    </button>
                    
                        
                </div>
            </div>
        </div>
    </main>

    <div x-data="{ showDrawer: false }" x-show="showDrawer" x-effect="$store.breakpoints.smAndUp && (showDrawer = false)"
        x-on:show-drawer.window="($event.detail.drawerId === 'pos-card-drawer') && (showDrawer = true)"
        @keydown.window.escape="showDrawer = false">
        <div class="fixed inset-0 z-[100] bg-slate-900/60 transition-opacity duration-200" @click="showDrawer = false"
            x-show="showDrawer" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"></div>
        <div class="fixed right-0 bottom-0 z-[101] h-[calc(100%-2.5rem)] w-full">
            <div class="flex h-full w-full flex-col rounded-t-2xl bg-white px-4 py-3 transition-transform duration-200 dark:bg-navy-700"
                x-show="showDrawer" x-transition:enter="ease-out transform-gpu"
                x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
                x-transition:leave="ease-in transform-gpu" x-transition:leave-start="translate-y-0"
                x-transition:leave-end="translate-y-full">
                <div class="flex items-center justify-between">
                    <div class="-ml-1 flex items-center space-x-1.5">
                        <button @click="showDrawer=false"
                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="flex items-center space-x-1">
                            <p>
                                <span class="text-base font-medium text-slate-700 dark:text-navy-100">Draft</span>
                                <span>#001</span>
                            </p>

                            <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                                class="inline-flex">
                                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                    class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                    <div
                                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Draft
                                                    #001</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Draft
                                                    #002</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Draft
                                                    #005</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="-mr-1.5 flex space-x-1">
                        <button
                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                        <button
                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 hover:text-error focus:bg-slate-300/20 focus:text-error active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                            class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div
                                    class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                Action</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex grow flex-col overflow-y-auto">
                    <div class="mt-4 flex grow flex-col space-y-3.5">
                        <div class="group flex items-center justify-between space-x-3">
                            <div class="flex items-center space-x-4">
                                <div class="relative flex">
                                    <img src="{{ asset('images/800x600.png') }}"
                                        class="mask is-star h-11 w-11 origin-center object-cover" alt="image" />

                                    <div
                                        class="absolute top-0 right-0 -m-1 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border border-white bg-slate-200 px-1 text-tiny+ font-medium leading-none text-slate-800 dark:border-navy-700 dark:bg-navy-450 dark:text-white">
                                        2
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-1">
                                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            Roast beef
                                        </p>
                                        <button
                                            class="btn h-6 w-6 rounded-full p-0 opacity-0 hover:bg-slate-300/20 focus:bg-slate-300/20 focus:opacity-100 active:bg-slate-300/25 group-hover:opacity-100 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                        Lorem ipsum dolor sit.
                                    </p>
                                </div>
                            </div>
                            <p class="font-inter font-semibold">$12.00</p>
                        </div>
                        <div class="group flex items-center justify-between space-x-3">
                            <div class="flex items-center space-x-4">
                                <div class="relative flex">
                                    <img src="{{ asset('images/800x600.png') }}"
                                        class="mask is-star h-11 w-11 origin-center object-cover" alt="image" />

                                    <div
                                        class="absolute top-0 right-0 -m-1 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border border-white bg-slate-200 px-1 text-tiny+ font-medium leading-none text-slate-800 dark:border-navy-700 dark:bg-navy-450 dark:text-white">
                                        1
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-1">
                                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            Tuna salad
                                        </p>
                                        <button
                                            class="btn h-6 w-6 rounded-full p-0 opacity-0 hover:bg-slate-300/20 focus:bg-slate-300/20 focus:opacity-100 active:bg-slate-300/25 group-hover:opacity-100 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                        Amet consectetur adip.
                                    </p>
                                </div>
                            </div>
                            <p class="font-inter font-semibold">$14.00</p>
                        </div>
                        <div class="group flex items-center justify-between space-x-3">
                            <div class="flex items-center space-x-4">
                                <div class="relative flex">
                                    <img src="{{ asset('images/800x600.png') }}"
                                        class="mask is-star h-11 w-11 origin-center object-cover" alt="image" />

                                    <div
                                        class="absolute top-0 right-0 -m-1 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border border-white bg-slate-200 px-1 text-tiny+ font-medium leading-none text-slate-800 dark:border-navy-700 dark:bg-navy-450 dark:text-white">
                                        3
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-1">
                                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            Salmon
                                        </p>
                                        <button
                                            class="btn h-6 w-6 rounded-full p-0 opacity-0 hover:bg-slate-300/20 focus:bg-slate-300/20 focus:opacity-100 active:bg-slate-300/25 group-hover:opacity-100 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                        Adipisicing elit. Quos?
                                    </p>
                                </div>
                            </div>
                            <p class="font-inter font-semibold">$45.00</p>
                        </div>
                        <div class="group flex items-center justify-between space-x-3">
                            <div class="flex items-center space-x-4">
                                <div class="relative flex">
                                    <img src="{{ asset('images/800x600.png') }}"
                                        class="mask is-star h-11 w-11 origin-center object-cover" alt="image" />

                                    <div
                                        class="absolute top-0 right-0 -m-1 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border border-white bg-slate-200 px-1 text-tiny+ font-medium leading-none text-slate-800 dark:border-navy-700 dark:bg-navy-450 dark:text-white">
                                        1
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-1">
                                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            California roll
                                        </p>
                                        <button
                                            class="btn h-6 w-6 rounded-full p-0 opacity-0 hover:bg-slate-300/20 focus:bg-slate-300/20 focus:opacity-100 active:bg-slate-300/25 group-hover:opacity-100 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                        Lorem, ipsum dolor.
                                    </p>
                                </div>
                            </div>
                            <p class="font-inter font-semibold">$22.00</p>
                        </div>
                        <div class="group flex items-center justify-between space-x-3">
                            <div class="flex items-center space-x-4">
                                <div class="relative flex">
                                    <img src="{{ asset('images/800x600.png') }}"
                                        class="mask is-star h-11 w-11 origin-center object-cover" alt="image" />

                                    <div
                                        class="absolute top-0 right-0 -m-1 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border border-white bg-slate-200 px-1 text-tiny+ font-medium leading-none text-slate-800 dark:border-navy-700 dark:bg-navy-450 dark:text-white">
                                        2
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-1">
                                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                            Duck carpaccio
                                        </p>
                                        <button
                                            class="btn h-6 w-6 rounded-full p-0 opacity-0 hover:bg-slate-300/20 focus:bg-slate-300/20 focus:opacity-100 active:bg-slate-300/25 group-hover:opacity-100 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                        Amet consectetur adip.
                                    </p>
                                </div>
                            </div>
                            <p class="font-inter font-semibold">$18.00</p>
                        </div>
                    </div>
                    <div class="my-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="space-y-2 font-inter">
                        <div class="flex justify-between text-slate-600 dark:text-navy-100">
                            <p>Subtotal</p>
                            <p class="font-medium tracking-wide">55.00$</p>
                        </div>
                        <div class="flex justify-between text-xs+">
                            <p>Tax</p>
                            <p class="font-medium tracking-wide">5.00$</p>
                        </div>
                        <div class="flex justify-between text-base font-medium text-primary dark:text-accent-light">
                            <p>Total</p>
                            <p>60.00$</p>
                        </div>
                    </div>
                    <div class="mt-5 grid grid-cols-3 gap-4 text-center" y-data="{ selected: 'button-1 }">
                        <button class="rounded-lg border border-slate-200 p-3 dark:border-navy-500 cursor-pointer" @click="selected = 'button-1'"
                                :class="selected === 'button-1' ?
                                    text-secondary bg-secondary:text-accent-light : 'text-slate-500 dark:text-navy-300':
                                    'text-slate-500 dark:text-navy-300'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-9 w-9" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="mt-1 font-medium text-primary dark:text-accent-light">
                                Cash
                            </span>
                        </button>
                        <button class="rounded-lg border border-slate-200 p-3 dark:border-navy-500 cursor-pointer"  @click="selected = 'button-2'"
                                :class="selected === 'button-2' ?
                                    text-primary dark:text-accent-light : 'text-slate-500 dark:text-navy-300':
                                    'text-slate-500 dark:text-navy-300'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-9 w-9" fill="none"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span class="mt-1 font-medium text-primary dark:text-accent-light">
                                E-Money
                            </span>
                        </button>
                    </div>
                    <button
                        class="btn mt-5 h-11 w-full justify-between bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <span>Checkout</span>
                        <span>$88.00</span>
                    </button>

                   
                </div>
            </div>
        </div>
    </div>

    <div class="fixed right-3 bottom-3 rounded-full bg-white dark:bg-navy-700">
        <button @click="$dispatch('show-drawer', { drawerId: 'pos-card-drawer' })"
            class="btn h-14 w-14 rounded-full bg-warning p-0 font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 sm:hidden">
            $60
        </button>
    </div>

    <script>
        let orderId;
        function addToCart(productId, productName, productPrice) {
    // Ambil keranjang dari local storage atau buat array kosong jika belum ada
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            console.log("Cart data before sending:", cart);


            // Cari produk di keranjang berdasarkan productId
            let productCart = cart.find(item => item.product_id === productId);
            
            // Tambah kuantitas jika produk sudah ada di keranjang
            if (productCart) {
                productCart.quantity += 1;
                productCart.total = productCart.price * productCart.quantity;
            } else {
                // Jika belum ada, tambahkan produk baru ke keranjang
                cart.push({
                    product_name: productName,
                    variant_ids: [1],
                    product_id: productId,
                    quantity: 1,
                    price: productPrice,
                    total: productPrice,
                });
            }

            // Simpan kembali keranjang ke local storage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Panggil updateCart untuk memperbarui tampilan keranjang
            updateCart();
        }

        function updateCart() {
            // Ambil keranjang dari local storage atau array kosong jika tidak ada
            let cart = JSON.parse(localStorage.getItem('cart'));
            let cartContainer = document.querySelector('.cart-items');
            cartContainer.innerHTML = ''; // Bersihkan elemen sebelum diisi ulang

            // Loop melalui setiap item di keranjang dan tambahkan ke HTML
            cart.forEach(item => {
                let cartItemHTML = `
                    <div class="rounded-xl cart-item flex items-center justify-between my-2 border-b pb-2 text-sm bg-white">
                            <!-- Product Image and Name -->
                            <div class="flex items-center">
                                <!-- Product Image -->
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200">
                                    <img src="path-to-product-image.jpg" alt="Product Image" class="w-full h-full object-cover">
                                </div>
                                <!-- Product Name -->
                                <div class="ml-3">
                                    <h3 class="font-semibold">${item.product_name}</h3>
                                </div>
                            </div>
                            <!-- Price and Quantity -->
                            <div class="text-right">
                                <p class="font-semibold text-gray-700">Rp ${item.total.toLocaleString()}</p>
                                <p class="text-xs" style="color: #4A5568;">x ${item.quantity}</p>
                            </div>
                        </div>
                `;
                cartContainer.innerHTML += cartItemHTML;
            });
        }

        async function saveOrderItemToDatabase () {
            let cart = JSON.parse(localStorage.getItem('cart'));
            if (!cart || cart.length === 0) {
                alert("Pesanan anda kosong!");
                return;
            }
            
            
            orderId = await createOrderId();

            cart = cart.map(item => ({
                ...item,
                order_id: orderId //  order_id  sama untuk semua item
            }));


            fetch("{{ route('saveOrderItem') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ cart: cart })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                alert("Order items berhasil disimpan ke database");
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Gagal menyimpan order items ke database");
            });
        }
                        

        function clearCart() {
            localStorage.removeItem('cart');
            updateCart(); // Perbarui tampilan keranjang
        }
        // Memuat keranjang dari local storage saat halaman dimuat

        document.addEventListener('DOMContentLoaded', updateCart);
        // clearCart();

        

        async function createOrderId() {
            const letter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            while (true) {
                let hurufDepan = '';
                for  (let i = 0; i < 3; i++) {
                    hurufDepan += letter.charAt(Math.floor(Math.random() * letter.length)); // math.random() akan menghasilkan bilangan diantara 0-1
                }
                const hurufAKhir = letter.charAt(Math.floor(Math.random() * letter.length));

                const date = new Date();
                const day = String(date.getDate()).padStart(2, '0'); // menambah 0 jika kurang dari 2
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = String(date.getFullYear()).slice(-2); // -2 mengambil dari urutan terakhir slice aslinya 2 (awal, akhir)

                const customDate = day[0] + year[0] + month[0] + month[1] + year[1] + day[1];
                const orderId = hurufDepan +  customDate +hurufAKhir;
                
                const response = await fetch(`/api/check_order_id/${orderId}`);
                if (!response.ok) {
                    // Jika tidak berhasil, log respons dan lempar error
                    const text = await response.text(); // Ambil teks untuk melihat apa yang terjadi
                    console.error('Server response:', text);
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                if (data.isUnique) {
                    return orderId;
                }
            }
        }
        

        function checkout() {
                             
                            fetch("{{ route('createTransaction') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    order_id: orderId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log("Response Data:", data);
                                if (data.error) {
                                    alert(data.error);
                                } else if (data) {
                                    const redirectUrl = `https://app.sandbox.midtrans.com/snap/v4/redirection/${data}`;
                                    console.log("Redirecting to:", redirectUrl);
                                    window.location.href = redirectUrl;
                                } else {
                                    alert("Terjadi kesalahan, tidak ada link pembayaran yang ditemukan.");
                                }
                            })
                            .catch(error => {
                                console.error("Error Details:", error);
                                alert("Terjadi kesalahan pada saat memproses transaksi. Silakan coba lagi nanti.");
                            });
                            clearCart();
                        }

    </script>
    <!-- function checkout() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        console.log("Keranjang checkout:", cart);
        // Di sini Anda bisa mengirim `cart` ke server menggunakan fetch atau AJAX
    } -->







</x-base-layout>
