<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class PaymentController extends Controller
{
    public function create (Request $request){
        $nama = [];
        $order_item = [];
        $grossAmount = 0;
        
        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        
        $valid = OrderItem::where('order_id', $order->id)->get();
        if ($valid->isEmpty()) {
            return response()->json(['error' => 'order item not found'], 404);
            for($i = 0; $i < $valid->count(); $i++) {
                $order_item[$i] = $valid->skip($i)->first();
                $nama[$i] = Product::find($order_item[$i]->product_id);
            }
        }

        $params = array (
            'transaction_details' => array(
                'order_id' => $request->test,
                'gross_amount' =>  $order->total_amount * 1000,
            ),
            
            'customer_details' => array(
                'first_name' => $order->customer_name,
                'email' => 'dummy@gmail.com',
            ),
            'item_details' => array(),
            'enabled_payments' => array('bca_va','bni_va','bri_va', 'gopay', 'shopeepay')
        );

        for ($i = 0; $i < $valid->count(); $i++) {
            $grossAmount = $grossAmount + $order_item[$i]->price * 1000 * $order_item[$i]->quantity;
        }

        $params['transaction_details']['gross_amount'] = $grossAmount;
        
        for ($i = 0; $i < $valid->count(); $i++) {
            $params['item_details'][] = array(
                'name' => $nama[$i]->name,
                'price' => $order_item[$i]->price * 1000,
                'quantity' => $order_item[$i]->quantity
            );
        }
        
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params); 
    
        $payment = new Transaction;
        $payment->order_id = $params['transaction_details']['order_id'];
        $payment->total_paid = $params['transaction_details']['gross_amount'];
        $payment->payment_status = 'pending';
        $payment->payment_method = '-';
        $payment->checkout_link = $response->json('token');
        $payment->save();
        
        return response()->json($response);
    }

    public function webhook(Request $request){
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get("https://api.sandbox.midtrans.com/v2/$request->order_id/status");

        $response = json_decode($response->body());

        $payment = Transaction::where('order_id',$response->order_id)->firstOrFail();

        if($payment->payment_status === 'settlement' || $payment->payment_status === 'capture'){
            return response()->json('Payment sedang di proses');
        }

        if($response->transaction_status === 'capture'){
            $payment->payment_status = 'capture';
        }
        if($response->transaction_status === 'settlement'){
            $payment->payment_status = 'settlement';
            $payment->payment_method = $response->payment_type;
        }
        if($response->transaction_status === 'pending'){
            $payment->payment_status = 'pending';
        }
        if($response->transaction_status === 'deny'){
            $payment->payment_status = 'deny';
        }
        if($response->transaction_status === 'expire'){
            $payment->payment_status = 'expire';
        }
        if($response->transaction_status === 'cancle'){
            $payment->payment_status = 'cancle';
        }
        $payment->save();
        return response()->json('success');
    }
}
