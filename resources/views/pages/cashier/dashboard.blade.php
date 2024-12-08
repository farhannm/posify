<x-app-layout title="Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <!-- Notification -->
        <div id="edit_success" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Order approved!
        </div>
        <div id="edit_failed" class="fixed bottom-5 right-5 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hidden transition-all duration-300 z-1">
            Failed to approve.
        </div>

        <script>
            @if(session('edit_success'))
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
            
        <div class="mt-5 grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
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
                        <!-- All Category -->
                        <div class="card swiper-slide w-24 shrink-0 cursor-pointer" @click="selected = 'slide-all'; filterProducts('all')">
                            <div class="flex flex-col items-center rounded-lg px-2 py-4"
                                :class="selected === 'slide-all' ?
                                    'text-secondary bg-secondary/10 dark:bg-secondary-light/10 dark:text-secondary-light' :
                                    'text-slate-600 dark:text-navy-100'">
                                <h3 class="font-medium">
                                    All
                                </h3>
                            </div>
                        </div>

                        <!-- Other Categories -->
                        @foreach ($categories as $index => $category)
                        <div class="card swiper-slide w-24 shrink-0 cursor-pointer" 
                            @click="selected = 'slide-{{ $index + 1 }}'; filterProducts('{{ $category->id }}')">
                            <div class="flex flex-col items-center rounded-lg px-2 py-4"
                                :class="selected === 'slide-{{ $index + 1 }}' ?
                                    'text-secondary bg-secondary/10 dark:bg-secondary-light/10 dark:text-secondary-light' :
                                    'text-slate-600 dark:text-navy-100'">
                                <h3 class="font-medium">
                                    {{ $category->category_name }}
                                </h3>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Product List -->
                    <div id="product-list" class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($products as $product)
                        <div class="card p-2 product-card" 
                            data-category="{{ $product->category_id }}" 
                            onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})" 
                            style="cursor: pointer;">
                            <div class="w-40 h-40 mx-auto flex items-center justify-center">
                                @if ($product->image)
                                    <img src="{{ $product->image }}" alt="Product" class="w-24">
                                @else
                                    <img src="{{asset('images/dishes.png')}}" alt="Product" class="w-26"/>
                                @endif
                            </div>
                            <div class="pt-2">
                                <p class="font-medium text-slate-700 dark:text-navy-100">{{ $product->name }}</p>
                                <p class="text-xs text-slate-400 dark:text-navy-300">{{ $product->description }}</p>
                                <p class="text-right font-medium mt-5 text-primary dark:text-accent-light">
                                    {{ 'Rp ' . number_format($product->price, 2) }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <script>
                        function filterProducts(categoryId) {
                            const productCards = document.querySelectorAll('.product-card');

                            productCards.forEach(card => {
                                // Show all products if "all" is selected
                                if (categoryId === 'all') {
                                    card.style.display = 'block';
                                } else {
                                    // Show only products matching the selected category
                                    if (card.dataset.category === categoryId) {
                                        card.style.display = 'block';
                                    } else {
                                        card.style.display = 'none';
                                    }
                                }
                            });
                        }
                    </script>
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

    <script>
        function addToCart(productId, productName, productPrice) {
            // Ambil keranjang dari local storage atau buat array kosong jika belum ada
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Cari produk di keranjang berdasarkan productId
            let productCart = cart.find(item => item.product_id === productId);

            // Tambah kuantitas jika produk sudah ada di keranjang
            if (productCart) {
                productCart.quantity += 1;
                productCart.total += productPrice;
            } else {
                // Jika belum ada, tambahkan produk baru ke keranjang
                cart.push({
                    product_id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1,
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
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
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
                                    <h3 class="font-semibold">${item.name}</h3>
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

                        

        function clearCart() {
            localStorage.removeItem('cart');
            updateCart(); // Perbarui tampilan keranjang
        }
        // Memuat keranjang dari local storage saat halaman dimuat

        document.addEventListener('DOMContentLoaded', updateCart);
        // clearCart();

        function checkout() {
            const orderId = 135; 
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







</x-base-layout>
