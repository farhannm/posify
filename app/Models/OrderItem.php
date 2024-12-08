<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'variant_ids', 'quantity', 'price', 'total'];

    protected $casts = [
        'variant_ids' => 'array', // Mengonversi ke dan dari JSON
    ];

    // Menghitung total di level aplikasi
    public function getTotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
