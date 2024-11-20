<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariantStock;

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

    public function approveOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
    
            $order->order_status = 'In Process';
            $order->save();
    
            return redirect()->route('viewAwaitingOrders')->with('edit_success', 'Order approved and now in process.');
        } catch (\Exception $e) {
            dd('Error saat mencoba approve order:', $e->getMessage());
    
            return redirect()->route('viewAwaitingOrders')->with('edit_failed', 'Failed to approve order: ' . $e->getMessage());
        }
    }

    public function createOrder(Request $request)
    {
        try {
            $request->validate([
                'customer_name' => 'required|string',
                'email' => 'nullable',
                'total_amount' => 'required|numeric|min:0',
            ]);
    
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'total_amount' => $request->total_amount,
                'order_status' => 'Pending',
            ]);
    
            $this->autoAssignOrder($order->id);
    
            return response()->json([
                'message' => 'Order berhasil dibuat dan didistribusikan ke kasir.',
                'order' => $order,
            ], 201);
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTrace());
        }
    }
    
    private function autoAssignOrder($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
    
            if (is_null($order->user_id)) {
                $cashier = User::where('role', 'cashier')
                               ->withCount('orders')
                               ->orderBy('orders_count', 'asc')
                               ->first();
    
                if ($cashier) {
                    $order->update(['user_id' => $cashier->id]);
                } else {
                    dd('Tidak ada kasir yang tersedia untuk menangani order ini.');
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTrace());
        }
    }           
    
}
