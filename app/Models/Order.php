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

    protected $fillable = ['user_id', 'customer_name', 'total_amount', 'email', 'payment_method'];
    protected $primaryKey = 'id'; // Tentukan kolom primary key
    public $incrementing = false; // Matikan auto-increment karena menggunakan string
    protected $keyType = 'string'; // Tentukan tipe key adalah string

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
