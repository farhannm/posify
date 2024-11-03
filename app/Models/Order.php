<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authorize;
use illuminate\Http\Request;
use illuminate\support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use illuminate\Support\Facades\Http;
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'customer_name', 'total_amount'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // protected static function booted()
    // {
    //     static::updated(function ($order) {
    //         if ($order->payment_status === 'paid' && is_null($order->transaction_id)) {
    //             DB::transaction(function () use ($order) {
    //                 $transaction = Transaction::create([
    //                     'total_paid' => $order->total_amount,
    //                     'payment_method' => $order->payment_method,
    //                 ]);

    //                 $order->transaction_id = $transaction->id;
    //                 $order->save();
    //             });
    //         }
    //     });
    // }



    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
