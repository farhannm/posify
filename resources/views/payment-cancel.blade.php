<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <!-- Link Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <x-base-layout>
        <div class="flex flex-col justify-center items-center h-screen w-full bg-white text-center">
            <div class="mb-4">
                <img src="{{ asset('images/payments/paymentCancel.png') }}" alt="Payment Cancel" class="w-full max-w-sm rounded-lg mx-auto"/>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mt-4">Payment Failed!</h1>
            <p class="text-gray-600 text-sm mt-2 mb-6">Pembayaran anda gagal, harap ulangi pesanan anda.</p>

            <div class="relative mt-4 animate__animated animate__tada animate__infinite">
                <div class="w-20 h-20 rounded-full border-4 border-red-500 flex items-center justify-center">
                    <svg
                        class="w-10 h-10 text-red-500"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            d="M6 6 L18 18 M6 18 L18 6"
                        ></path>
                    </svg>
                </div>
            </div>

            <div>
                <button class="bg-red-500 text-white font-medium rounded-full mt-10 py-2 px-6 hover:bg-red-600 transition">
                    Selanjutnya
                </button>
            </div>
        </div>
    </x-base-layout>
</body>
</html>
