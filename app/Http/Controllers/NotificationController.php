<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function handlePaymentStatus(Request $request) {
        $payment = Transaction::where('order_id', $request->order_id)->first();

        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        $order = Order::find($payment->order_id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($payment->payment_status === 'settlement') {
            return view ('payment-success');
        }

        if ($payment->payment_status === 'cancle') {
            return view ('payment-cancel');
        }    

        return response()->json('Payment status tidak dikenali.');
    }
}
