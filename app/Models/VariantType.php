<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    
    public function variants()
    {
        return $this->hasMany(Variant::class, 'variant_type_id');
    }
}
