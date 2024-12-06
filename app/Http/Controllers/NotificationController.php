<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NotificationController extends Controller
{
    public function handlePaymentStatus(Request $request)
    {
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get("https://api.sandbox.midtrans.com/v2/$request->order_id/status");

        $response = json_decode($response->body());

        $payment = Transaction::where('order_id', $response->order_id)->firstOrFail();
        $order = Order::find($response->order_id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($response->transaction_status === 'settlement') {
            $payment->payment_status = 'settlement';
            $payment->payment_method = $response->payment_type;
            $order->transaction_id = $payment->id;

            $order->save();
            $payment->save();

            return view('payment-success'); 
        }

        if ($response->transaction_status === 'cancel') {
            $payment->payment_status = 'cancel';

            $payment->save();

            return view('payment-cancel'); 
        }
        return response()->json('success');
    }
}
