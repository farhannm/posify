<x-app-layout title="{{ $product->name }}" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

    <!-- Notification -->
    <div id="delete_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
        Variant deleted successfully.
    </div>
    <div id="delete_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
        Failed to delete Variant.
    </div>
    <div id="create_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
        Variant created successfully.
    </div>
    <div id="create_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
        Failed to create Variant.
    </div>
    <div id="edit_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
        Variant updated successfully.
    </div>
    <div id="edit_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
        Failed to update Variant.
    </div>


    <script>
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

        function showNotification(id) {
            document.getElementById(id).classList.remove('hidden');
            setTimeout(function() {
                document.getElementById(id).classList.add('hidden');
            }, 3000); 
        }
    </script>

        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <a class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-xl" href="{{ route('adminDashboardView') }}">
                Posify
            </a>
            <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary hover:underline" href="{{ route('view-products') }}">Product</a> 
                </li>
            </ul>
            <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary hover:underline" href="{{ route('view-product-detail', $product->id) }}">{{ $product->name }}</a> 
                </li>
            </ul>
        </div>

        <div class="card p-4 lg:p-6">
            <!-- Product Image -->
            <div class="w-full">
                <img src="{{ asset('images/dishes.png') }}" alt="Product" class="w-full h-72 object-scale-down">
            
              <!-- Product Details -->
              <div class="p-6">
                <h2 class="text-sm uppercase tracking-widest text-gray-500">{{ $product->category ? $product->category->category_name : 'No Category' }}</h2>
        
                <!-- Price -->
                <div class="flex items-center justify-between mt-2">
                    <h1 class="text-4xl font-semibold text-gray-800 mt-2">{{ $product->name }}</h1>
                    <span class="text-3xl text-blue-500">{{ $product->price ? 'Rp. ' . number_format($product->price, 0, ',', '.') : 'N/A' }}</span>
                </div>

                <p class="text-gray-600 mt-4">
                    {{ $product->description }}
                </p>
        
                <!-- Variant Selection -->
                <div class="mt-6">
                    {{-- <div class="flex space-x-4">
                        @forelse ($variants as $variant)
                            <button class="avatar w-fit top-5 border rounded-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                                <span class="absolute right-0 bottom-6 h-8 w-8 rounded-full border-2 border-white bg-primary dark:border-navy-700 flex items-center justify-center">
                                    <p class="text-white text-sm m-0">{{ $variant->stock }}</p>
                                </span>
                                <p class="text-sm+">{{ $variant->value }}</p>
                            </button>
                        @empty
                            <p class="text-gray-500">No variants available.</p>
                        @endforelse
                    </div> --}}

                    @if ($product->productVariantStocks->isEmpty())
                        <h3 class="text-lg font-medium text-gray-800 mb-2">No Variant</h3>
                        <div class="flex items-center w-full justify-end">
                            <a href="{{ route('add-variants-form', $product->id) }}"><h3 class="text-sm+ font-medium text-primary/65 hover:text-primary/100 mb-2 cursor-pointer">Add variant</h3></a>
                        </div>
                    @else
                        <div class="flex">
                            <div class="flex items-center w-full justify-start">
                                <h3 class="text-lg font-medium text-gray-800 mb-2">Variant</h3>
                            </div>

                            <div class="flex items-center w-full justify-end">
                                <a href="{{ route('add-variants-form', $product->id) }}"><h3 class="text-sm+ font-medium text-primary/65 hover:text-primary/100 mb-2 cursor-pointer">Add variant</h3></a>
                            </div>
                        </div>

                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            #
                                        </th>
                                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Variants
                                        </th>
                                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Additional Price
                                        </th>
                                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Stock
                                        </th>
                                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            isAvailable?
                                        </th>
                                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody x-data="{ expanded: null }">
                                    @foreach ($productVariantStocks as $index => $stock)
                                        <tr class="border-y border-transparent">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                @if(isset($results[$index]['variant_values']))
                                                    {{ implode(' in ', $results[$index]['variant_values']) }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ $stock->additional_price ? 'Rp. ' . number_format($stock->additional_price, 0, ',', '.') : 'N/A' }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ $stock->stock }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                {{ $stock->isAvailable ? 'TRUE' : 'FALSE' }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="mr-2">
                                                    <button class="btn h-8 w-8 rounded-md bg-violet-100 p-0 font-medium text-slate-800 hover:bg-violet-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="if(isShowPopper) isShowPopper = false" class="inline-flex">
                                                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
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
                                                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this Variant?');">
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
                    @endif                  
                </div>
              </div>
            </div>
        </div>
    </main>
</x-app-layout>