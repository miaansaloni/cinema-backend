<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'discount_percentage',
        'condition',
    ];

    protected $casts = [
        'discount_percentage' => 'decimal:2', // Cast del campo come decimal con 2 cifre decimali
    ];
}
