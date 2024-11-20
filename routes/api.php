<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create', [PaymentController::class, 'create'])->name('createTransaction');
Route::post('/webhooks', [PaymentController::class, 'webhook'])->name('updateTransaction');

Route::get('/product-variant-stocks', function (Request $request) {
    $productVariantStocks = DB::table('product_variant_stocks')->get();

    $results = [];

    foreach ($productVariantStocks as $stock) {
        $variantIds = json_decode($stock->variant_ids);
        
        $variantValues = DB::table('variants')
            ->whereIn('id', $variantIds)
            ->pluck('value') // Mengambil kolom 'value'
            ->toArray(); // Ubah menjadi array
        
        // Simpan hasil dengan format yang diinginkan
        $results[] = [
            'product_variant_stock_id' => $stock->id,
            'variant_values' => $variantValues,
        ];
    }

    return response()->json($results);
});

Route::post('/orders', [OrderController::class, 'createOrder']);
