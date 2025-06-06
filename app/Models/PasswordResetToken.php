<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    // tidak ada id 
    protected $primaryKey = null;
    public $incrementing = false;

    
    protected $table = 'password_resets';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'token',
        'created_at',
        'expires_at',
    ];
}
