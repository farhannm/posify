<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['variant_type_id', 'value', 'additional_price'];

    public function variantType()
    {
        return $this->belongsTo(VariantType::class);
    }
}
