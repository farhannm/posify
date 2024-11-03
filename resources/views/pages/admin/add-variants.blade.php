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
                                    Add Variants
                                </h4>
                            </div>
                        </div>
                        <div class="space-y-4 p-4 sm:p-5">
                            <div x-data="{ variants: [{ type: '', size: '', flavour: '', stock: '', price: '' }] }">
                                <template x-for="(variant, index) in variants" :key="index">
                                    <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-300 rounded-lg mt-4">
                                        <label class="block">
                                            <span>Variant Type</span> <span class="text-red-500">*</span>
                                            <select
                                                x-model="variant.type"
                                                class="mt-1.5 w-full"
                                                placeholder="Select a variant type..."
                                                autocomplete="off"
                                            >
                                                <option value="">Select a variant type...</option>
                                                <option value="Size">Size</option>
                                                <option value="Flavour">Flavour</option>
                                            </select>
                                        </label>
                
                                        <!-- Size Radio Group -->
                                        <label class="block" x-show="variant.type.includes('Size')">
                                            <span>Size</span> <span class="text-red-500">*</span>
                                            <div class="mt-3" x-data="{ selectedVariant: 'normal' }">
                                                <div class="inline-space">
                                                    <label class="inline-flex items-center space-x-2">
                                                        <input
                                                            x-model="selectedVariant"
                                                            value="normal"
                                                            class="form-radio is-outline size-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                            name="size"
                                                            type="radio"
                                                        />
                                                        <p>Normal</p>
                                                    </label>
                                                    <label class="inline-flex items-center space-x-2">
                                                        <input
                                                            x-model="selectedVariant"
                                                            value="medium"
                                                            class="form-radio is-outline size-5 rounded-full border-slate-400/70 before:bg-secondary checked:border-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:before:bg-secondary-light dark:checked:border-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                                                            name="size"
                                                            type="radio"
                                                        />
                                                        <p>Medium</p>
                                                    </label>
                                                    <label class="inline-flex items-center space-x-2">
                                                        <input
                                                            x-model="selectedVariant"
                                                            value="large"
                                                            class="form-radio is-outline size-5 rounded-full border-slate-400/70 before:!bg-info checked:!border-info hover:!border-info focus:!border-info dark:border-navy-400"
                                                            name="size"
                                                            type="radio"
                                                        />
                                                        <p>Large</p>
                                                    </label>
                                                </div>
                                                <p>Value: <span x-text="selectedVariant"></span></p>
                                            </div>
                                        </label>
                
                                        <!-- Flavor Radio Group -->
                                        <label class="block" x-show="variant.type.includes('Flavour')">
                                            <span>Flavor</span> <span class="text-red-500">*</span>
                                            <div class="mt-3" x-data="{ selectedVariant: 'vanilla' }">
                                                <div class="inline-space">
                                                    <label class="inline-flex items-center space-x-2">
                                                        <input
                                                            x-model="selectedVariant"
                                                            value="vanilla"
                                                            class="form-radio is-outline size-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                                            name="flavour"
                                                            type="radio"
                                                        />
                                                        <p>Vanilla</p>
                                                    </label>
                                                    <label class="inline-flex items-center space-x-2">
                                                        <input
                                                            x-model="selectedVariant"
                                                            value="chocolate"
                                                            class="form-radio is-outline size-5 rounded-full border-slate-400/70 before:bg-secondary checked:border-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:before:bg-secondary-light dark:checked:border-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                                                            name="flavour"
                                                            type="radio"
                                                        />
                                                        <p>Chocolate</p>
                                                    </label>
                                                    <label class="inline-flex items-center space-x-2">
                                                        <input
                                                            x-model="selectedVariant"
                                                            value="strawberry"
                                                            class="form-radio is-outline size-5 rounded-full border-slate-400/70 before:!bg-info checked:!border-info hover:!border-info focus:!border-info dark:border-navy-400"
                                                            name="flavour"
                                                            type="radio"
                                                        />
                                                        <p>Strawberry</p>
                                                    </label>
                                                </div>
                                                <p>Value: <span x-text="selectedVariant"></span></p>
                                            </div>
                                        </label>
                
                                        <div class="grid grid-cols-2 gap-4 mt-4">
                                            <div class="grid grid-cols-1">
                                                <label class="block">
                                                    <span>Stock</span><span class="text-red-500">*</span>
                                                    <input
                                                        x-model="variant.stock"
                                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        placeholder="Enter stock... " type="number" />
                                                </label>
                                            </div>
                
                                            <div class="grid grid-cols-1">
                                                <label class="block">
                                                    <span>Additional Price</span><span class="text-red-500">*</span>
                                                    <input
                                                        x-model="variant.price"
                                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        placeholder="Rp. " type="text" />
                                                </label>
                                            </div>
                                        </div>
                
                                        <!-- Conditionally render the remove button -->
                                        <button 
                                            x-show="index !== 0" 
                                            @click="variants.splice(index, 1)" 
                                            type="button" 
                                            class="mt-4 text-red-500"
                                        >
                                            Remove variant
                                        </button>
                                    </div>
                                </template>
                
                                <button 
                                    @click="variants.push({ type: '', size: '', flavour: '', stock: '', price: '' })" 
                                    type="button" 
                                    class="mt-4 text-blue-500"
                                >
                                    Add another variant
                                </button>
                            </div>
                
                            <button type="submit" class="btn space-x-2 btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary/20">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </main>
</x-app-layout>