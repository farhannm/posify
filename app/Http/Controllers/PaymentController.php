<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\OrderItem;
use App\Models\Product;
class PaymentController extends Controller
{
    
    public function create (Request $request){
        $order = OrderItem::find($request->order_id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $nama = Product::find($order->product_id);
        if (!$nama) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $params = array (
            'transaction_details' => array(
                'order_id' => $request->test,
                'gross_amount' =>  $order->price * $order->quantity * 1000,
            ),
            
            'customer_details' => array(
                'first_name' => $order->customer_name,
                'email' => 'dummy@gmail.com',
            ),
            'item_details' => array(
                array(
                    'name' => $nama->name,
                    'price' => $order->price * 1000,
                    'quantity' => $order->quantity,
                )
            ),
            'enabled_payments' => array('credit_card','bca_va','bni_va','bri_va')
        );
        
        
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));
    
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $response = json_decode($response->body());
    
        $payment = new Transaction;
        $payment->order_id = $params['transaction_details']['order_id'];
        $payment->total_paid = $order->price * $order->quantity;
        $payment->payment_status = 'pending';
        $payment->payment_method = '-';
        $payment->checkout_link = $response->redirect_url;
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
