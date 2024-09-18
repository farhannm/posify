<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'category', 'is_available'];

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'product_variants');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    
}
