<x-app-layout title="Add Product" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <!-- Notification -->
        <div id="create_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Product created successfully.
        </div>
        <div id="create_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to create product.
        </div>

        <script>
            // Menampilkan notifikasi sesuai dengan session yang ada
            @if(session('create_success'))
                showNotification('create_success');
            @elseif(session('create_failed'))
                showNotification('create_failed');
            @endif
        
            // Fungsi untuk menampilkan notifikasi dengan animasi
            function showNotification(id) {
                document.getElementById(id).classList.remove('hidden');
                setTimeout(function() {
                    document.getElementById(id).classList.add('hidden');
                }, 5000); // Hilangkan notifikasi setelah 5 detik
            }
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

        <form action="#" enctype="multipart/form-data" method="POST">
            @method('POST')
            @csrf
        
            @if ($errors->has('error'))
                <div class="alert flex space-x-2 rounded-lg border border-error px-1 py-1 text-error text-tiny+ mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif
        
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6" x-data="{ step: 1 }">
                <!-- Step Indicator -->
                <div class="col-span-12 lg:col-span-4 lg:place-items-center mt-14 ml-18">
                    <div>
                        <ol class="steps is-vertical line-space [--size:2.75rem] [--line:.5rem]">
                            <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500" :class="{ 'before:bg-primary': step === 1 }">
                                <div :class="step === 1 ? 'bg-primary text-white' : 'bg-slate-200 text-slate-500' " class="step-header mask is-hexagon">
                                    <i class="fa-solid fa-layer-group text-base"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Step 1</p>
                                    <h3 class="text-base font-medium" :class="step === 1 ? 'text-primary dark:text-accent-light' : '' ">General</h3>
                                </div>
                            </li>
                            <li class="step space-x-4 pb-12 before:bg-slate-200 dark:before:bg-navy-500" :class="{ 'before:bg-primary': step === 2 }">
                                <div :class="step === 2 ? 'bg-primary text-white' : 'bg-slate-200 text-slate-500' " class="step-header mask is-hexagon">
                                    <i class="fa-solid fa-list text-base"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Step 2</p>
                                    <h3 class="text-base font-medium" :class="step === 2 ? 'text-primary dark:text-accent-light' : '' ">Variants</h3>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
        
                <!-- Form Content -->
                <div class="col-span-12 lg:col-span-8">
                    <div class="card">
                        <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                            <div class="flex items-center space-x-2">
                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                    <i class='bx bx-message-square-add text-xl'></i>
                                </div>
                                <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                    Add Product
                                </h4>
                            </div>
                        </div>
                        <div class="space-y-4 p-4 sm:p-5">
                            <!-- Step 1: General Information -->
                            <div x-show="step === 1">
                                <div class="space-y-4 p-4 sm:p-5">
                                    <label class="block">
                                        <span>Product Name</span><span class="text-red-500">*</span>
            
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter product name" type="text" />
                                    </label>
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <label class="block">
                                            <span>Category</span> <span class="text-red-500">*</span>
                                            <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, { create: true, sortField: { field: 'text', direction: 'asc' } })">
                                                <option>Coffee</option>
                                                <option>Non Coffee</option>
                                                <option>Meals</option>
                                                <option>Side Dish</option>
                                            </select>
                                        </label>
            
                                        <div class="grid grid-cols-1">
                                            <label class="block">
                                                <span>Price</span><span class="text-red-500">*</span>
                                                <input
                                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                    placeholder="Rp. " type="text" />
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <span>Images</span>
                                        <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                                            <input type="file" x-init="$el._x_filepond = FilePond.create($el)" multiple />
                                        </div>
                                    </div>
                                </div> 
        
                                <div class="flex justify-end space-x-2 mt-10">
                                    <button type="button" @click="step = 2"
                                        class="btn space-x-2 btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary/25">
                                        <span>Next</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
        
                            <!-- Step 2: Variants Inputs -->
                            <div x-show="step === 2">
                                <div class="grid grid-cols-1 gap-4">
                                    <label class="block">
                                        <span>Variant Type</span> <span class="text-red-500">*</span>
                                        <select
                                          x-init="$el._tom = new Tom($el,{
                                                plugins: {
                                                'clear_button':{
                                                    'title':'Remove all selected options',
                                                }
                                                },
                                                persist: false,
                                                create: true
                                            })"
                                          class="mt-1.5 w-full"
                                          multiple
                                          placeholder="Select a variant..."
                                          autocomplete="off"
                                        >
                                          <option value="">Select a variant type...</option>
                                          <option value="Size" selected>Size</option>
                                          <option value="Miaw">Miaw</option>
                                          <option value="Flavour" selected>Flavour</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="grid grid-cols-1 gap-4 mt-4">
                                    <label class="block">
                                        <span>Product Variant</span> <span class="text-red-500">*</span>
                                        <div class="mt-5" x-data="{selectedVariants: ['normal']}">
                                            <div class="inline-space">
                                              <label class="inline-flex items-center space-x-2">
                                                <input
                                                  x-model="selectedVariants"
                                                  value="normal"
                                                  class="form-checkbox is-outline size-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                  type="checkbox"
                                                />
                                                <p>Normal</p>
                                              </label>
                                              <label class="inline-flex items-center space-x-2">
                                                <input
                                                  x-model="selectedVariants"
                                                  value="medium"
                                                  class="form-checkbox is-outline size-5 rounded-full border-slate-400/70 before:!bg-info checked:!border-info hover:!border-info focus:!border-info dark:border-navy-400"
                                                  type="checkbox"
                                                />
                                                <p>Medium</p>
                                              </label>
                                              <label class="inline-flex items-center space-x-2">
                                                <input
                                                  x-model="selectedVariants"
                                                  value="large"
                                                  class="form-checkbox is-outline size-5 rounded-full border-slate-400/70 before:!bg-success checked:!border-success hover:!border-success focus:!border-success dark:border-navy-400"
                                                  type="checkbox"
                                                />
                                                <p>Large</p>
                                              </label>
                                            </div>
                                            <p>Value: <span x-text="selectedVariants"></span></p>
                                          </div>
                                    </label>
        
                                    <div class="grid grid-cols-1">
                                        <label class="block">
                                            <span>Price</span><span class="text-red-500">*</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Rp. " type="text" />
                                        </label>
                                    </div>
                                    
                                    <div class="grid grid-cols-1">
                                        <label class="block">
                                            <span>Stock</span><span class="text-red-500">*</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Enter stock... " type="number" />
                                        </label>
                                    </div>

                                </div>
        
                                <div class="flex justify-between space-x-2 mt-10">

                                    <button type="button" @click="step = 1" class="btn bg-gray-200"
                                        class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Prev</span>
                                    </button>

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