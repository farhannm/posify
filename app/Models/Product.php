<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'image', 'is_available'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function productVariantStocks()
    {
        return $this->hasMany(ProductVariantStock::class, 'product_id');
    }

    public function variants()
    {
        $variantIds = $this->variantIds(); 
        return Variant::whereIn('id', $variantIds)->get();
    }

    private function variantIds()
    {
        return $this->productVariantStocks->flatMap(function ($stock) {
            return $stock->variant_ids;
        })->unique()->values()->all();
    }
}

