<?php

namespace App\Http\Controllers;

use App\Models\ProductVariantStock;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);
        $price = $product->price;
        $quantity = 1;
        // ambil keranjang
        $cart = session()->get('cart', []);

        $sudahAda = null;
        foreach ($cart as $indexKe => $item) {
            // cek produk dan variant apakah sudah ada di cart
            if ($item['product_id'] == $product->id) {
                $sudahAda = $indexKe;
                break;
            }
        }

        // jika ada maka perbarui quantitasnya
        if ($sudahAda != null) {
            $cart[$sudahAda]['quantity'] += $quantity;
            $cart[$sudahAda]['total'] += $quantity * $price;

        } else {
            // kalo ga ada, tambah data baru ke keranjang
            $cartItem = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $price * $quantity,
                'name' => $product->name, 
            ];
            $cart[] = $cartItem;
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);


        
    } 

    
}
