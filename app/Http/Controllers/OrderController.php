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
            

            $identitas = $request->validate([
                'identitas' => 'required|array',
                'identitas.*.name' => 'required|string',
                'identitas.*.email' => 'required|string',
            ]);

            
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
            

            // $jenisPembayaran = $request->validate('jenisPembayaran' => 'required|string');
            \Log::info('Validated Identitas Data:', $identitas);
            \Log::info('Validated Cart Data:', $validated);

            $jenisPembayaran = $request->input('jenisPembayaran');
            $totalBayar = $request->input('totalBayar');  // Pastikan ini adalah tipe numeric

            \Log::info('Jenis Pembayaran:', ['jenisPembayaran' => $jenisPembayaran]);
            \Log::info('Total Bayar:', ['totalBayar' => $totalBayar]);

            $totalAmount = 0;

            foreach ($validated['cart'] as $item) {
                $totalAmount += $item['total']; 
            }
            $orderId = $validated['cart'][0]['order_id'];
            \Log::info('Order ID:', ['order_id' => $orderId]);

            $order = Order::create([
                'id' => $orderId,
                'user_id' => 1,
                'customer_name' => $identitas['identitas'][0]['name'],
                'email' => $identitas['identitas'][0]['email'], // dari frontend
                'total_amount' => $totalBayar,
                'jenis_pembayaran' => $jenisPembayaran,
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
