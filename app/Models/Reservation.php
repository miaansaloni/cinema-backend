<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'showtime_id',
        'seat_id',
        'status',
        'base_price',
        'discount_id',
        'final_price',
        'purchase_date',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'final_price' => 'decimal:2',
        'purchase_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function discount()
    {
        return $this->belongsTo(DiscountCategory::class);
    }
}
