<x-app-layout title="Products" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <!-- Notification -->
        <div id="delete_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Food deleted successfully.
        </div>
        <div id="delete_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to delete food.
        </div>
        <div id="create_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Food created successfully.
        </div>
        <div id="create_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to create food.
        </div>
        <div id="edit_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Food updated successfully.
        </div>
        <div id="edit_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to update food.
        </div>


        <script>
            // Menampilkan notifikasi sesuai dengan session yang ada
            @if(session('delete_success'))
                showNotification('delete_success');
            @elseif(session('delete_failed'))
                showNotification('delete_failed');
            @elseif(session('create_success'))
                showNotification('create_success');
            @elseif(session('create_failed'))
                showNotification('create_failed');
            @elseif(session('edit_success'))
                showNotification('edit_success');
            @elseif(session('edit_failed'))
                showNotification('edit_failed');
            @endif
        
            // Fungsi untuk menampilkan notifikasi dengan animasi
            function showNotification(id) {
                document.getElementById(id).classList.remove('hidden');
                setTimeout(function() {
                    document.getElementById(id).classList.add('hidden');
                }, 5000); // Hilangkan notifikasi setelah 3 detik
            }
        </script>

        <div class="mt-3 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <a class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl" href="{{ route('adminDashboardView') }}">
                    Posify
                </a>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary hover:underline" href="{{ route('view-products') }}">Products</a> 
                    </li>
                </ul>
            </div>

    
            <a href="{{ route('add-product-form') }}">
                <button
                    class="btn space-x-2 bg-slate-700 font-medium text-white hover:bg-slate-800 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-50" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Add Products</span>
                </button>
            </a>
        </div>

        <div class="grid mt-2 grid-cols-3 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">

            <div class="card col-span-1 rounded-2xl px-5 pb-5 sm:p-5 bg-[#3878FF]" style="height: 20rem">
                    
                <div>
                    <p class="font-medium text-slate-300">Products</p>
                    <p class="text-6xl font-semibold text-white">
                        {{ $totalProduct ? $totalProduct : 0 }}
                    </p>
                </div>

                <img class="h-40 object-contain sm:mt-0" src="{{ asset('images/dishes.png') }}" alt="image" />
                {{-- <div class="flex justify-end z-3">
                    <a href="{{ route('view-products') }}">
                        <button
                            class="btn h-8 w-8 rounded-md bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12" />
                            </svg>
                        </button>
                    </a>
                </div> --}}

                {{-- <div class="flex justify-end">
                    <a href="{{ route('view-product-variants')}}">
                        <button class="badge mt-5 rounded-lg bg-black/20 text-indigo-50 p-2 w-36 text-sm hover:bg-black/35">
                            {{ $totalVariants ? $totalVariants : 0 }} variants
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12" />
                            </svg>
                        </button>
                    </a>
                </div> --}}
            </div>
            
            <div class="col-span-2">
                <div class="flex items-center justify-between">
                    <h2 class="ml-5 mb-2 text-base font-bold tracking-wide text-slate-700 dark:text-navy-100">
                        Products Category
                    </h2>
                </div>
                <div class="mt-3">  
                    <div class="mt-4 grid grid-cols-4 gap-3 sm:mt-5 sm:grid-cols-4 sm:gap-5 sm:px-5 lg:mt-6">
                        <div class="card col-span-2 justify-between p-5">
                            <p class="font-medium">Coffee</p>
                            <div class="flex items-center justify-between pt-4">
                                <p class="text-slate-700 dark:text-navy-100">
                                    <span class="text-slate-800 font-semibold text-3xl">
                                        {{ $countCoffee ? $countCoffee : 0 }}
                                    </span>                                         
                                </p>
                                <i class='text-slate-700 bx bxs-coffee-bean text-4xl'></i>
                            </div>
                        </div>

                        <div class="card col-span-2 justify-between p-5">
                            <p class="font-medium">Non Coffee</p>
                            <div class="flex items-center justify-between pt-4">
                                <p class="text-slate-700 dark:text-navy-100">
                                    <span class="text-slate-800 font-semibold text-3xl">
                                        {{ $countNonCoffee ? $countNonCoffee : 0 }}
                                    </span>                                   
                                </p>
                                <i class='text-slate-800 bx bxs-wine text-4xl'></i>
                            </div>
                        </div>

                        <div class="card col-span-2 justify-between p-5">
                            <p class="font-medium">Meals</p>
                            <div class="flex items-center justify-between pt-4">
                                <p class="text-slate-700 dark:text-navy-100">
                                    <span class="text-slate-800 font-semibold text-3xl">
                                        {{ $countMeals ? $countMeals : 0 }}
                                    </span>
                                </p>
                                <i class='text-slate-800 bx bxs-bowl-rice text-4xl'></i>
                            </div>
                        </div>

                        <div class="card col-span-2 justify-between p-5">
                            <p class="font-medium">Side Dish</p></p>
                            <div class="flex items-center justify-between pt-4">
                                <p class="text-slate-700 dark:text-navy-100">
                                    <span class="text-slate-800 font-semibold text-3xl">
                                        {{ $countSideDish? $countSideDish : 0 }}
                                    </span>
                                </p>
                                <i class='text-slate-800 bx bxs-baguette text-4xl'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="flex items-center justify-between mt-6">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                List of Products
            </h2>
            <div class="flex">
            <div class="flex items-center" x-data="{isInputActive:false}">
                <label class="block">
                <input
                    x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                    :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                    class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                    placeholder="Search here..."
                    type="text"
                />
                </label>
                <button @click="isInputActive = !isInputActive" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4.5 w-4.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
                </button>
            </div>
            </div>
        </div>
            <div class="card mt-3">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                 Product Name
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Category
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Stock
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Base Price
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Variants
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody x-data="{ expanded: null }">
                            @foreach ($products as $product)
                                <tr class="border-y border-transparent">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $product->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $product->category ? $product->category->category_name : 'No Category' }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $product->total_stock ? $product->total_stock : 'Out of Stock' }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $product->price ? 'Rp. ' . number_format($product->price, 0, ',', '.') : 'N/A' }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $product->productVariantStocks()->count() ? $product->productVariantStocks()->count() : 'No Variant'}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <a href="{{ route('view-product-detail', $product->id) }}" class="mr-2">
                                            <button
                                                class="btn h-8 w-8 rounded-md bg-violet-100 p-0 font-medium text-slate-800 hover:bg-violet-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                                </svg>
                                            </button>
                                        </a>
                                        <div
                                            x-data="usePopper({placement:'bottom-end',offset:4})"
                                            @click.outside="if(isShowPopper) isShowPopper = false"
                                            class="inline-flex"
                                        >
                                            <button
                                            x-ref="popperRef"
                                            @click="isShowPopper = !isShowPopper"
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                                    />
                                                </svg>
                                            </button>

                                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this food?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>

                <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    <div class="text-xs+">
                        Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} entries
                    </div>
                
                    <ol class="pagination space-x-1.5">
                        <!-- Link ke halaman sebelumnya -->
                        @if ($products->onFirstPage())
                            <li class="disabled">
                                <span
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $products->previousPageUrl() }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 hover:bg-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </a>
                            </li>
                        @endif
                
                        <!-- Links ke setiap halaman -->
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <li>
                                    <a href="#" class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-primary text-white px-3 leading-tight">{{ $page }}</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-slate-150 px-3 leading-tight hover:bg-slate-300">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                
                        <!-- Link ke halaman berikutnya -->
                        @if ($products->hasMorePages())
                            <li>
                                <a href="{{ $products->nextPageUrl() }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 hover:bg-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li class="disabled">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </li>
                        @endif
                    </ol>
                </div>                            
            </div>
        </div>
    </main>
</x-app-layout>