<x-app-layout title="Order History" is-header-blur="true">
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
            
            @if ($orders->isNotEmpty())
            <div class="flex items-center justify-between mt-6">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Order History
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

            <div>
                <div class="card mt-3">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        #
                                    </th>
                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Transaction ID
                                    </th>
                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Customer Name
                                    </th>
                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Order Status
                                    </th>
                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Total Amount
                                    </th>
                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Total Amount
                                    </th>
                                    <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        More
                                    </th>
                                    {{-- <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Actions
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody x-data="{ expanded: null }">
                                @foreach($orders as $index => $order)
                                    <tr class="border-y border-transparent">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            ORD-{{ $order->id }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $order->transaction_id ?? '-' }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                            {{ $order->customer_name }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $order->order_status }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            Rp. {{ number_format($order->total_amount, 2) }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $order->payment_method }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <button @click="expanded === {{ $index }} ? expanded = null : expanded = {{ $index }}" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <i :class="expanded === {{ $index }} && '-rotate-180'" class="fas fa-chevron-down text-sm transition-transform"></i>
                                            </button>                                                
                                        </td>
                                        {{-- <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <form action="{{ route('approve-order', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to approve this order?');">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    Approve
                                                </button>
                                            </form>                                        
                                        </td> --}}
                                    </tr>
                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                        <td colspan="100" class="p-0">
                                            <div x-show="expanded === {{ $index }}" x-collapse>
                                                <div class="px-4 pb-4 sm:px-5">
                                                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                                        <table class="is-hoverable w-full text-left">
                                                            <thead>
                                                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                    <th class="px-3 py-3 font-semibold text-slate-800 dark:text-navy-100 lg:px-5">#</th>
                                                                    <th class="px-3 py-3 font-semibold text-slate-800 dark:text-navy-100 lg:px-5">Product</th>
                                                                    <th class="px-3 py-3 font-semibold text-slate-800 dark:text-navy-100 lg:px-5">Variant</th>
                                                                    <th class="px-3 py-3 font-semibold text-slate-800 dark:text-navy-100 lg:px-5">Quantity</th>
                                                                    <th class="px-3 py-3 font-semibold text-slate-800 dark:text-navy-100 lg:px-5">Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($order->items as $item)
                                                                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                            {{ $loop->iteration }}
                                                                        </td>
                                                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $item->product->name }}</td>
                                                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                                            @if(isset($item->variant_results[$index]['variant_values']))
                                                                                {{ implode(' in ', $item->variant_results[$index]['variant_values']) }}
                                                                            @else
                                                                                N/A
                                                                            @endif
                                                                        </td>
                                                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $item->quantity }}</td>
                                                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">Rp. {{ number_format($item->price, 2) }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
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
                            Showing {{ $orders->firstItem() }} - {{ $orders->lastItem() }} of {{ $orders->total() }} entries
                        </div>
                    
                        <ol class="pagination space-x-1.5">
                            <!-- Link ke halaman sebelumnya -->
                            @if ($orders->onFirstPage())
                                <li class="disabled">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $orders->previousPageUrl() }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 hover:bg-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </a>
                                </li>
                            @endif
                    
                            <!-- Links ke setiap halaman -->
                            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                @if ($page == $orders->currentPage())
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
                            @if ($orders->hasMorePages())
                                <li>
                                    <a href="{{ $orders->nextPageUrl() }}" class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 hover:bg-slate-300">
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
        @else
            <div class="min-h-screen flex items-center justify-center">
                <div class="grid max-w-screen-lg grid-cols-1 place-items-center gap-12 lg:grid-cols-2 lg:gap-24">
                    <div class="absolute p-2 opacity-20 lg:static lg:opacity-100">
                        <img width="440" x-show="!$store.global.isDarkModeEnabled" src="{{asset('images/illustrations/penguins.svg')}}"
                            alt="404 image" />
                        <img width="440" x-show="$store.global.isDarkModeEnabled" src="{{asset('images/illustrations/penguins-dark.svg')}}"
                            alt="404 image" />
                    </div>
                    <div class="z-2 text-center lg:text-left">
                        <p class="mt-2 text-7xl font-bold text-primary dark:text-accent lg:mt-0">
                            Currently Empty
                        </p>
                        <p class="mt-4 text-slate-500 dark:text-navy-200 lg:text-lg">
                            No orders history
                        </p>
                    </div>
                </div>
            </div>        
        @endif
    </main>
</x-app-layout>

