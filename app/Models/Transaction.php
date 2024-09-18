<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'total_paid', 'payment_method'];

    // Relasi one-to-one dengan Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
