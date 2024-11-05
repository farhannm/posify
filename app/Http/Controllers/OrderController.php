<?php

namespace App\Http\Controllers;

use App\Models\ProductVariantStock;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'nullable|integer|exists:product_variant_stocks,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $variantStock = $request->variant_id ? ProductVariantStock::find($request->variant_id) : null;
        $price = $variantStock ? $variantStock->additional_price + $product->price : $product->price;
        // ambil keranjang
        $cart = session()->get('cart', []);

        $sudahAda = null;
        foreach ($cart as $indexKe => $item) {
            // cek produk dan variant apakah sudah ada di cart
            if ($item['product_id'] == $product->id && ($item['variant'] == ($variantStock ? json_decode($variantStock->variant_ids) : null))) {
                $sudahAda = $indexKe;
                break;
            }
        }

        // jika ada maka perbarui quantitasnya
        if ($sudahAda != null) {
            $cart[$sudahAda]['quantity'] += $request->quantity;
            $cart[$sudahAda]['total'] += $request->quantity * $price;

        } else {
            // kalo ga ada, tambah data baru ke keranjang
            $cartItem = [
                'product_id' => $product->id,
                'variant' => $variantStock ? json_decode($variantStock->variant_ids) : null,
                'quantity' => $request->quantity,
                'price' => $price,
                'total' => $price * $request->quantity,
                'name' => $product->name, 
            ];
            $cart[] = $cartItem;
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);


        

        // if ($product->has_variant && !empty($request->variant_id)) {
        //     $variantStock = ProductVariantStock::where('product_id', $product->id)
        //                                         ->where('variant_ids', json_encode($request->variant_id)) // asumsi si variant_ids adalah tipe json
        //                                         ->first();
        //     // check ketersediaan
        //     if (!$variantStock || $variantStock->stock < $request->quantity) {
        //         return response()->json(['success' => false, 'message' => 'Stok untuk varian tersebut tidak tersedia atau kurang']);
        //     }
        // }

        
    } 

    
}
