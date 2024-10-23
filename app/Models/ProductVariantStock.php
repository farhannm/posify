<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariantStock extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'variant_ids', 'stock'];

    /**
     * Cast variant_ids as JSON.
     */
    protected $casts = [
        'variant_ids' => 'array',
    ];

    /**
     * Relasi ke model Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Kurangi stok produk dengan jumlah tertentu.
     * 
     * @param int $amount Jumlah stok yang dikurangi
     * @return bool
     */
    public function decrementStock(int $amount = 1): bool
    {
        if ($this->stock >= $amount) {
            $this->decrement('stock', $amount);
            return true;
        }

        return false; 
    }

    /**
     * Tambah stok produk dengan jumlah tertentu.
     * 
     * @param int $amount Jumlah stok yang ditambah
     * @return void
     */
    public function incrementStock(int $amount = 1): void
    {
        $this->increment('stock', $amount);
    }

    /**
     * Validasi apakah stok tersedia untuk kombinasi varian.
     * 
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->stock > 0;
    }
}
