<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function saveOrderItem(Request $request)
    {
        try {
            \Log::info('Cart Data:', $request->all());

            
            // Validasi data
            $validated = $request->validate([
                'cart' => 'required|array',
                'cart.*.order_id' => 'required|string', 
                'cart.*.product_id' => 'required|integer',
                'cart.*.variant_ids' => 'required|array',
                'cart.*.quantity' => 'required|integer',
                'cart.*.price' => 'required|numeric',
                'cart.*.total' => 'required|numeric',
            ]);

            \Log::info('Validated Data:', $validated); // Lihat data yang telah divalidasi

            $totalAmount = 0;

            foreach ($validated['cart'] as $item) {
                $totalAmount += $item['total']; 
            }
            $orderId = $validated['cart'][0]['order_id'];
            \Log::info('Order ID:', ['order_id' => $orderId]);

            $order = Order::create([
                'id' => $orderId,
                'user_id' => 1,
                'customer_name' => 'Hanif', // dari front end checkout
                'email' => 'dummy@gmail.com', // dari frontend
                'total_amount' => $totalAmount,
            ]);
    

            foreach ($validated['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'variant_ids' => $item['variant_ids'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['total'],
                ]);
            }
    
            return response()->json(['message' => 'Order Items saved successfully']);
        } catch (\Exception $e) {
            \Log::error('Error saving order items:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to save order items'], 500);
        }
    }

    public function checkOrderId($orderId) 
    {
        $isUnique = !Order::where('id', $orderId)->exists();
        return response()->json([
            'isUnique' => $isUnique
        ]);
    }
}
