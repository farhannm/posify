<x-app-layout title="Add Variants" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
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
            <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary hover:underline" href="{{ route('add-variants-form', $product->id) }}">Add Variants</a> 
                </li>
            </ul>
        </div>

        <form action="{{ route('add-variants', $product->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
        
            @if ($errors->any())
                <div class="alert flex space-x-2 rounded-lg border border-error px-1 py-1 text-error text-tiny+ mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif
        
            <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-300 rounded-lg mt-4">            
                <!-- Multi Checkbox untuk Variants -->
                <label class="block">
                    <span>Variants</span> <span class="text-red-500">*</span>
                    <ul class="grid w-full gap-6 md:grid-cols-3 mt-2">
                        @foreach($variant as $item)
                            <li>
                                <input type="checkbox" id="variant-{{ $item->id }}" name="variant_ids[]" value="{{ $item->id }}" class="hidden peer">
                                <label for="variant-{{ $item->id }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ $item->value }}</div>
                                    </div>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </label>
                
                <!-- Input untuk Stock dan Additional Price -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="grid grid-cols-1">
                        <label class="block">
                            <span>Stock</span><span class="text-red-500">*</span>
                            <input
                                name="stock"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter stock... " type="number" />
                        </label>
                    </div>
        
                    <div class="grid grid-cols-1">
                        <label class="block">
                            <span>Additional Price</span><span class="text-red-500">*</span>
                            <input
                                name="additional_price"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Rp. " type="number" step="0.01" />
                        </label>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn space-x-2 btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary/20 mt-4">
                Submit
            </button>
        </form>        
    </main>
</x-app-layout>