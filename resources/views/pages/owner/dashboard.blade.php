<x-app-layout title="Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
     {{-- <style>
        * {
            border: 1px solid red;
        }
    </style>  --}}
    <main class="main-content w-full pb-8 hidden sm:block">
        <div class="flex">
            <div class="w-1/2 ml-auto">
                <h1 class="font-bold text-4xl text-black ml-6 mt-4">Overview</h1>
            </div>
            <div class="w-1/2 justify-center mr-5">
                <div>
                <form method="GET" action="{{ route('ownerDashboardView') }}" id="dateForm">
                    <!-- calendar -->
                    <div class="flex justify-center mt-4">
                        <label class="relative flex">
                            <input
                                x-init="$el._x_flatpickr = flatpickr($el, {
                                mode: 'range', 
                                dateFormat: 'Y-m-d', 
                                defaultDate: [
                                    '{{ request('rentang_tanggal') ? explode(" to ", request('rentang_tanggal'))[0] : \Carbon\Carbon::today()->format('Y-m-d') }}',
                                    '{{ request('rentang_tanggal') ? explode(" to ", request('rentang_tanggal'))[1] ?? explode(" to ", request('rentang_tanggal'))[0] : \Carbon\Carbon::today()->format('Y-m-d') }}'
                                ],
                                onClose: function(selectedDates, dateStr, instance) {
                                    if (selectedDates.length === 2) {
                                        document.getElementById('dateForm').submit();
                                    }
                                }
                                })"
                                name="rentang_tanggal"
                                class="form-input peer w-56 rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Choose date..."
                                type="text"
                                value="{{ request('rentang_tanggal') }}"
                            />
                            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 transition-colors duration-200"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10m-11 9h12c.55 0 1-.45 1-1V8c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1v11c0 .55.45 1 1 1z"/>
                                </svg>
                            </span>
                        </label>
                    </div>
                </form>

                
                </div>
            </div>
        </div>
            

        
        <div class="flex">
            
            <!-- Bagian kiri -->
             <div class="w-1/2 ml-auto">
                <!-- this month -->
            <div class="p-5 rounded-3xl inline-flex justify-between items-center">
                <div>    
                    <div class="flex font-bold sm:text-2xl lg:text-3xl text-black">
                        <div class="mr-2">Rp</div>
                        <div>{{ number_format($revenueThisMonth['totalBulanRevenue'], 2, ',', '.') }}</div>
                    </div>
                    <div class="flex mr-1 text-xs mt-1">  
                    @if ($revenueThisMonth['isRevenueBulananIncreased'])
                        <span class="text-green-500 mr-1">▲</span>
                        <div class="text-green-500">{{ number_format($revenueThisMonth['persentase'], 2) }}</div>
                        <div class="text-green-500">%</div>
                    @else
                        <span class="text-red-500 mr-1">▼</span>
                        <div class="text-red-500">{{ number_format($revenueThisMonth['persentase'], 2) }}</div>
                        <div class="text-red-500">%</div>
                    @endif
                    </div>
                    <div class="text-2xl text-black">This Month</div>
                </div>
                <div class="ml-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-50 hover:opacity-100" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0c0 0 0 0 0 0l.4 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c0 0 0 0 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.8c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352l34.4 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L48.4 288c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"/></svg>
                </div>
            </div>
                <div class="mr-5 ml-5 box-border rounded-lg">
                        
                    <!-- Bar Chart -->
                    <div class="card px-4 pb-4 sm:px-5 rounded-3xl shadow-md mt-4">
                        <div id="barChartVertical"></div>
                    </div>

                    <!-- end of graph area -->
                </div>
            </div>



            <!-- bg-slate-50 -->
            <!-- bagian kanan -->
            <div class="w-1/2 ml-auto mr-10">
                <!-- Revenue -->
            <div class="shadow-md mr-5 ml-5 rounded-3xl box-border bg-white p-5 mx-auto">
                <!-- uang -->
                <div class="flex justify-center sm:text-2xl xl:text-4xl font-bold text-black"> 
                    <div class="mr-2">Rp</div>
                    <div>{{ number_format($revenueData['totalRevenue'], 2, ',', '.') }}</div>
                </div>
                <!-- persentase -->
                <div class="flex justify-center mr-1">
                {{-- @if ($revenueData['isRevenueIncreased'])
                    <span class="text-green-500 mr-1">▲</span>
                    <div class="text-green-500">{{ number_format($revenueData['persentase'], 0) }}</div>
                    <div class="text-green-500">%</div>
                @else
                    <span class="text-red-500 mr-1">▼</span>
                    <div class="text-red-500">{{ number_format($revenueData['persentase'], 0) }}</div>
                    <div class="text-red-500">%</div>
                @endif --}}


                </div>
                <!-- text revenue -->
                <div class="flex justify-center mt-1">
                    <div class="xl:text-3xl sm:text-2xl font-light text-black">Revenue</div>
                </div>
            </div>

                <div class="mr-5 ml-5 mt-0 box-border rounded-lg">
                    <!-- baris 2 -->
                    <div class="flex space-x-5 mt-5">   
                        <!-- most sold -->
                        <div class="shadow-md w-1/2 rounded-3xl box-border bg-white p-5">
                            <!-- nama item  -->
                        <div class="font-bold sm:text-l xl:text-xl lg:text-2xl text-black">{{$rankSoldItem['mostSold']->name}}</div>
                        <div class="flex text-xs text-black font-light">
                            <div class="mr-1">{{$rankSoldItem['mostSold']->total_quantity}}</div>
                            <div>Item</div>
                        </div>
                        <div class="text-neutral-900">Most Sold</div>
                        </div>

                        <!-- least sold -->
                        <div class="shadow-md w-1/2 rounded-3xl box-border bg-white p-5">
                            <!-- nama item  -->
                        <div class="font-bold sm:text-l xl:text-xl lg:text-2xl text-black">{{$rankSoldItem['leastSold']->name}}</div>
                        <div class="flex text-xs text-black font-light">
                            <div class="mr-1">{{$rankSoldItem['leastSold']->total_quantity}}</div>
                            <div>Item</div>
                        </div>
                        <div class="text-neutral-900">Least Sold</div>
                        </div>
                    </div>


                    <!-- baris akhir -->
                    <div class="flex space-x-5 mt-5">
                        <!-- total transaction -->
                        <div class="shadow-md w-1/2 rounded-3xl box-border bg-white p-5">
                            <!-- nilai  -->
                            <div class="font-bold sm:text-l lg:text-xl xl:text-2xl text-black">{{ number_format($transactionData['totalTransaksi'], 0, ',', '.')}}</div>
                         <!-- persentase -->
                        <div class="flex mr-1 text-xs">  
                        {{-- @if ($transactionData['isTransactionIncreased'])
                            <span class="text-green-500 mr-1">▲</span>
                            <div class="text-green-500 ">{{ number_format($transactionData['persentase']) }}</div>
                            <div class="text-green-500">%</div>
                        @else
                            <span class="text-red-500 mr-1">▼</span>
                            <div class="text-red-500">{{ number_format($transactionData['persentase']) }}</div>
                            <div class="text-red-500">%</div>
                        @endif --}}
                        </div>
                            <div class="text-neutral-900">Total Transcation</div>
                        </div>

                        <!-- Item Sold -->
                        <div class="shadow-md w-1/2 rounded-3xl box-border bg-white p-5">
                            <!-- nilai  -->
                            <div class="font-bold sm:text-l lg:text-xl xl:text-2xl text-black">{{ number_format($totalItemData['totalItemTerjual'], 0, ',', '.')}}</div>
                         <!-- persentase -->
                        <div class="flex mr-1 text-xs">  
                        {{-- @if ($totalItemData['isSoldItemIncreased'])
                            <span class="text-green-500 mr-1">▲</span>
                            <div class="text-green-500">{{ number_format($totalItemData['persentase']) }}</div>
                            <div class="text-green-500">%</div>
                        @else
                            <span class="text-red-500 mr-1">▼</span>
                            <div class="text-red-500">{{ number_format($totalItemData['persentase']) }}</div>
                            <div class="text-red-500">%</div>
                        @endif --}}
                        </div>
                            <div class="text-neutral-900">Item Sold</div>

                        </div>
                    </div>
                    
                    <!-- SOLD OUT ITEM -->
                    <div class="shadow-md rounded-3xl box-border bg-white p-5 mx-auto mt-5 h-100">
                        <div class="m-2 justify-center flex text-neutral-900 xl:text-2xl md:text-l lg:text-2xl font-bold">
                            Almost Out of Stock Product
                        </div>
                        <div class="flex flex-col space-y-4">
                            <!-- item1 -->
                            @forelse ($soldItemToday as $item)
                                <div class="shadow-lg rounded-3xl p-4 flex justify-between items-center bg-white">
                                    <div class="font-bold sm:text-l lg:text-xl xl:text-2xl text-black">
                                        {{$item->product_name}}
                                    </div>
                                    <div class="flex items-center">
                                        <div class="mr-1">
                                            {{$item->product_stock}}
                                        </div>
                                        <div>
                                            Item
                                        </div> 
                                    </div>          
                                </div>
                            @empty
                            <div class="shadow-lg rounded-3xl p-4 flex justify-center items-center bg-white">
                                <div class="font-bold xl:text-xl sm:text-m md:text-m lg:text-l text-base">
                                    No Products to Show
                                </div>
                            </div>
                            
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
            
    </main>

    {{-- mobile --}}
    <main class="main-content w-full pb-8 sm:hidden">
        <div class="flex ">
            <h1 class="font-bold text-2xl text-black mx-auto">Overview</h1>
        </div>

        <!-- this month -->
        <div class="p-2 rounded-3xl flex flex-col justify-center items-center">
            <div>    
                <div class="flex font-bold text-xl text-black">
                    <div class="mr-2">Rp</div>
                    <div>{{ number_format($revenueThisMonth['totalBulanRevenue'], 2, ',', '.') }}</div>
                </div>
                <div class="flex justify-center">  
                @if ($revenueThisMonth['isRevenueBulananIncreased'])
                    <span class="text-green-500 mr-1 text-xs">▲</span>
                    <div class="text-green-500 text-xs">{{ number_format($revenueThisMonth['persentase'], 2) }}</div>
                    <div class="text-green-500 text-xs">%</div>
                @else
                    <span class="text-red-500 mr-1 text-xs">▼</span>
                    <div class="text-red-500 text-xs">{{ number_format($revenueThisMonth['persentase'],2 ) }}</div>
                    <div class="text-red-500 text-xs">%</div>
                @endif
                </div>
                <div class="text-l text-black flex justify-center">This Month</div>
            </div>
            <div class="flex justify-center mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 opacity-50 hover:opacity-100" viewBox="0 0 512 512">
                    <path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0c0 0 0 0 0 0l.4 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c0 0 0 0 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.8c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352l34.4 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L48.4 288c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"/>
                </svg>
            </div>
        </div>

         <!-- graph area -->
        <div class="card rounded-3xl shadow-md">
            <div class="flex justify-center w-full h-full">
                <div id="barChartHorizontal" class="flex justify-center w-full h-full"></div>
            </div>
        </div>
        
        

        
        <!-- calendar -->
        <div class="w-1/2 m-auto mt-4">
                <form method="GET" action="{{ route('ownerDashboardView') }}" id="dateForm">
                    <div class="flex justify-center">
                        <label class="relative flex">
                            <input
                                x-init="$el._x_flatpickr = flatpickr($el, {
                                mode: 'range', 
                                dateFormat: 'Y-m-d', 
                                defaultDate: [
                                    '{{ request('rentang_tanggal') ? explode(" to ", request('rentang_tanggal'))[0] : \Carbon\Carbon::today()->format('Y-m-d') }}',
                                    '{{ request('rentang_tanggal') ? explode(" to ", request('rentang_tanggal'))[1] ?? explode(" to ", request('rentang_tanggal'))[0] : \Carbon\Carbon::today()->format('Y-m-d') }}'
                                ],
                                onClose: function(selectedDates, dateStr, instance) {
                                    if (selectedDates.length === 2) {
                                        document.getElementById('dateForm').submit();
                                    }
                                }
                                })"
                                name="rentang_tanggal"
                                class="form-input peer w-38 rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Choose date..."
                                type="text"
                                value="{{ request('rentang_tanggal') }}"
                            />
                            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 transition-colors duration-200"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10m-11 9h12c.55 0 1-.45 1-1V8c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1v11c0 .55.45 1 1 1z"/>
                                </svg>
                            </span>
                        </label>
                </form>
            </div>
        </div>

        <div class="w-full">
            <div class="m-3 box-border rounded-lg">
            <!-- Revenue -->
                <div class="shadow-md rounded-3xl box-border bg-white p-2 mx-auto">
                    <!-- uang -->
                    <div class="flex justify-center text-2xl font-bold text-black"> 
                        <div class="mr-2">Rp</div>
                        <div>{{ number_format($revenueData['totalRevenue'], 2, ',', '.') }}</div>
                    </div>
                    <!-- persentase -->
                    <div class="flex justify-center mr-1">
                    {{-- @if ($revenueData['isRevenueIncreased'])
                        <span class="text-green-500 mr-1 text-xs">▲</span>
                        <div class="text-green-500 text-xs">{{ number_format($revenueData['persentase'], 0) }}</div>
                        <div class="text-green-500 text-xs">%</div>
                    @else
                        <span class="text-red-500 mr-1 text-xs">▼</span>
                        <div class="text-red-500 text-xs">{{ number_format($revenueData['persentase'], 0) }}</div>
                        <div class="text-red-500 text-xs">%</div>
                    @endif --}}


                    </div>
                    <!-- text revenue -->
                     <div class="flex justify-center mt-1">
                        <div class="text-xl font-light text-black">Revenue</div>
                     </div>
                </div>


                <!-- baris 2 -->
                <div class="flex space-x-5 mt-3">   
                    <!-- most sold -->
                    <div class="shadow-md w-1/2 rounded-2xl box-border bg-white p-3 flex flex-col justify-center">
                        <!-- nama item  -->
                    <div class="font-bold text-l text-black">{{$rankSoldItem['mostSold']->name}}</div>
                    <div class="flex text-xs text-black font-light">
                        <div class="mr-1">{{$rankSoldItem['mostSold']->total_quantity}}</div>
                        <div>Item</div>
                    </div>
                    <div class="text-neutral-900">Most Sold</div>
                    </div>

                    <!-- least sold -->
                    <div class="shadow-md w-1/2 rounded-2xl box-border bg-white p-3 flex flex-col justify-center">
                        <!-- nama item  -->
                    <div class="font-bold text-l text-black">{{$rankSoldItem['leastSold']->name}}</div>
                    <div class="flex text-xs text-black font-light">
                        <div class="mr-1">{{$rankSoldItem['leastSold']->total_quantity}}</div>
                        <div>Item</div>
                    </div>
                    <div class="text-neutral-900">Least Sold</div>
                    </div>
                </div>


                <!-- baris akhir -->
                <div class="flex space-x-5 mt-3">
                    <!-- total transaction -->
                    <div class="shadow-md w-1/2 rounded-2xl box-border bg-white p-3 flex flex-col justify-center">
                        <!-- nilai  -->
                        <div class="font-bold text-l text-black">{{ number_format($transactionData['totalTransaksi'], 0, ',', '.')}}</div>
                     <!-- persentase -->
                    <div class="flex mr-1 text-xs">  
                    {{-- @if ($transactionData['isTransactionIncreased'])
                        <span class="text-green-500 mr-1 text-xs">▲</span>
                        <div class="text-green-500 text-xs">{{ number_format($transactionData['persentase']) }}</div>
                        <div class="text-green-500 text-xs">%</div>
                    @else
                        <span class="text-red-500 mr-1 text-xs">▼</span>
                        <div class="text-red-500 text-xs">{{ number_format($transactionData['persentase']) }}</div>
                        <div class="text-red-500 text-xs">%</div>
                    @endif --}}
                    </div>
                        <div class="text-neutral-900">Total Transcation</div>
                    </div>

                    <!-- Item Sold -->
                    <div class="shadow-md w-1/2 rounded-2xl box-border bg-white p-3 flex flex-col justify-center">
                        <!-- nilai  -->
                        <div class="font-bold text-l text-black">{{ number_format($totalItemData['totalItemTerjual'], 0, ',', '.')}}</div>
                     <!-- persentase -->
                    <div class="flex mr-1 text-xs">  
                    {{-- @if ($totalItemData['isSoldItemIncreased'])
                        <span class="text-green-500 mr-1 text-xs">▲</span>
                        <div class="text-green-500 text-xs">{{ number_format($totalItemData['persentase']) }}</div>
                        <div class="text-green-500 text-xs">%</div>
                    @else
                        <span class="text-red-500 mr-1 text-xs">▼</span>
                        <div class="text-red-500 text-xs">{{ number_format($totalItemData['persentase']) }}</div>
                        <div class="text-red-500 text-xs">%</div>
                    @endif --}}
                    </div>
                        <div class="text-neutral-900">Item Sold</div>

                    </div>
                </div>
                
                <!-- SOLD OUT ITEM -->
                <div class="shadow-md rounded-3xl box-border bg-white p-2 mx-auto mt-2 h-auto">
                    <div class="m-2 justify-center flex text-neutral-900 text-xl">
                        Almost Out of Stock Product
                    </div>
                    <div class="flex flex-col space-y-4">
                        <!-- item1 -->
                        @forelse ($soldItemToday as $item)
                            <div class="shadow-lg rounded-2xl p-3 mb-2 flex justify-between items-center bg-white">
                                <div class="font-bold text-l text-black">
                                    {{$item->product_name}}
                                </div>
                                <div class="flex text-xs items-center">
                                    <div class="mr-1">
                                        {{$item->product_stock}}
                                    </div>
                                    <div>
                                        Item
                                    </div> 
                                </div>          
                            </div>
                        @empty
                        <div class="shadow-lg rounded-2xl p-3 mb-2 flex justify-center items-center bg-white">
                            <div class="font-bold text-l text-base">
                                No Products to Show
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
    </main>


    
    
    <script>
        var barChartVertical = {
            colors: ["#31E1EC", "#3878FF"],
            series: [
                {
                    name: "Revenue",
                    data: [44000000, 55000000, 57000000, 56000000, 61000000, 58000000, 63000000, 70000000, 65000000, 60000000, 72000000, 68000000],
                    type: "bar",
                },
            ],
            chart: {
                type: "bar",
                width: "100%",
                height: 505,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: "55%",
                    barHeight: "70%",
                    borderRadius: 5,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                labels: {
                    show: false,
                },
            },
            
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: [
                    {
                        formatter: function (val) {
                            let formattedValue = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                            }).format(val);
                            return formattedValue.replace('IDR', 'Rp');
                        },
                    },
                ],
            },
            legend: {
                position: "top",
                horizontalAlign: "right",
                fontSize: "14px",
                markers: {
                    radius: 12,
                },
            },
        };
    
        var barChartHorizontal = {
        colors: ["#31E1EC", "#3878FF"],
        series: [
            {
                name: "Revenue",
                data: [44000000, 55000000, 57000000, 56000000, 61000000, 58000000, 63000000, 70000000, 65000000, 60000000, 72000000, 68000000],
                type: "bar",
            },
        ],
        chart: {
            type: "bar",
            width: "90%",
            height: 200,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                barHeight: "70%",
                borderRadius: 5,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        },
        yaxis: {
            show: false,
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: [
                {
                    formatter: function (val) {
                        let formattedValue = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                        }).format(val);
                        return formattedValue.replace('IDR', 'Rp');
                    },
                },
            ],
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            fontSize: "14px",
            markers: {
                radius: 12,
            },
        },
    };
    
        document.addEventListener("DOMContentLoaded", function () {
            var chartVertical = new ApexCharts(document.querySelector("#barChartVertical"), barChartVertical);
            chartVertical.render();

            var chartHorizontal = new ApexCharts(document.querySelector("#barChartHorizontal"), barChartHorizontal);
            chartHorizontal.render();
        });
    </script>
    
</x-app-layout>