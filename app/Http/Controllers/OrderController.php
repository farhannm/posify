<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\ProductVariantStock;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function saveOrderItem(Request $request)
    {
        try {
            Log::info('Cart Data:', $request->all());
            

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
            Log::info('Validated Identitas Data:', $identitas);
            Log::info('Validated Cart Data:', $validated);

            $jenisPembayaran = $request->input('jenisPembayaran');
            $totalBayar = $request->input('totalBayar');  // Pastikan ini adalah tipe numeric

            Log::info('Jenis Pembayaran:', ['jenisPembayaran' => $jenisPembayaran]);
            Log::info('Total Bayar:', ['totalBayar' => $totalBayar]);

            $totalAmount = 0;

            foreach ($validated['cart'] as $item) {
                $totalAmount += $item['total']; 
            }
            $orderId = $validated['cart'][0]['order_id'];
            Log::info('Order ID:', ['order_id' => $orderId]);

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
            Log::error('Error saving order items:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to save order items'], 500);
        }
    }

    public function approveOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->order_status = 'In Process';
            $order->save() ;
    
            $transaction = new Transaction();
            $transaction->order_id = $order->id;
            $transaction->total_paid = $order->total_amount;
            $transaction->payment_status = 'Completed';
            $transaction->payment_method = $order->payment_method;
            $transaction->checkout_link = null;
            $transaction->save();
    
            $order->transaction_id = $transaction->id;
            $order->save();
    
            return redirect()->route('viewAwaitingOrders')->with('edit_success', 'Order approved and now in process.');
        } catch (\Exception $e) {
            dd('Error saat mencoba approve order:', $e->getMessage());
            return redirect()->route('viewAwaitingOrders')->with('edit_failed', 'Failed to approve order: ' . $e->getMessage());
        }
    }
    
    public function cancelOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
    
            $order->order_status = 'Cancelled';
            $order->save();
    
            return redirect()->route('viewAwaitingOrders')->with('edit_success', 'Order cancelled');
        } catch (\Exception $e) {
            dd('Error saat mencoba approve order:', $e->getMessage());
    
            return redirect()->route('viewAwaitingOrders')->with('edit_failed', 'Failed to cancle: ' . $e->getMessage());
        }
    }

    public function completeOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
    
            $order->order_status = 'Done';
            $order->save();
    
            return redirect()->route('viewProcessedOrders')->with('edit_success', 'Updated');
        } catch (\Exception $e) {
            dd('Error saat mencoba approve order:', $e->getMessage());
    
            return redirect()->route('viewProcessedOrders')->with('edit_failed', 'Fail: ' . $e->getMessage());
        }
    }

    public function createOrder(Request $request)
    {
        try {
            $request->validate([
                'customer_name' => 'required|string',
                'email' => 'required|string',
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

    public function checkOrderId($orderId) 
    {
        $isUnique = !Order::where('id', $orderId)->exists();
        return response()->json([
            'isUnique' => $isUnique
        ]);
    }
}
