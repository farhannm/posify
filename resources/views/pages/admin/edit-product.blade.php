<x-app-layout title="Edit Product" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <!-- Notification -->
        <div id="delete_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Product deleted successfully.
        </div>
        <div id="delete_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to delete product.
        </div>
        <div id="create_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Product created successfully.
        </div>
        <div id="create_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to create product.
        </div>
        <div id="edit_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Product updated successfully.
        </div>
        <div id="edit_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to update product.
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
                        <a class="text-primary hover:underline" href="{{ route('view-products') }}">Products</a> 
                    </li>
                </ul>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary hover:underline" href="{{ route('add-product-form') }}">Add Product</a> 
                    </li>
                </ul>
            </div>
        </div>

        <form action="{{ route('products-update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
        
            @if ($errors->has('error'))
                <div class="alert flex space-x-2 rounded-lg border border-error px-1 py-1 text-error text-tiny+ mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif
        
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6" x-data="{ step: 1 }">
                <div class="col-span-12">
                    <div class="card">
                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                            <div class="flex items-center space-x-2">
                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                    <i class='bx bx-message-square-edit text-xl'></i>
                                </div>
                                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                    Edit Product
                                </h4>
                            </div>
                        </div>
                        <div class="space-y-4 p-4 sm:p-5">
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="Product" class="w-full h-72 object-scale-down">
                            @else
                                <img src="{{asset('images/dishes.png')}}" alt="Product" class="w-full h-72 object-scale-down"/>
                            @endif
                            <div x-show="step === 1">
                                <div class="space-y-4 p-4 sm:p-5">
                                    <label class="block">
                                        <span>Product Name</span><span class="text-red-500">*</span>
                                        <input
                                            name="name"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter product name" type="text" value="{{$product->name}}" required />
                                    </label>
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <label class="block">
                                            <span>Category</span> <span class="text-red-500">*</span>
                                            <select name="category_id" class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, { create: true, sortField: { field: 'text', direction: 'asc' } })" required>
                                                <option value="">Select a category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                        {{ $product->category && $product->category->id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->category_name }}
                                                    </option> 
                                                @endforeach
                                            </select>
                                        </label>
        
                                        <div class="grid grid-cols-1">
                                            <label class="block">
                                                <span>Price</span><span class="text-red-500">*</span>
                                                <input
                                                    name="price" 
                                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                    placeholder="Rp. " type="number" value="{{ $product->price }}" required />
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <span>Description</span>
                                        <textarea
                                            name="description"
                                            rows="4"
                                            placeholder="Product description..."
                                            class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        >{{$product->description}}</textarea>
                                    </div>

                                    <div>
                                        <span>Images</span>
                                        <div class="filepond fp-bordered fp-bg-filled">
                                            <input class="mb-5" type="file" name="image" id="image"/>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn space-x-2 btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary/20">
                                        Submit
                                    </button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
    </main>
</x-app-layout>