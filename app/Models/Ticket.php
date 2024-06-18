<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
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


    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($ticket) {
    //         $reservation = Reservation::find($ticket->reservation_id);

    //         if ($reservation && $reservation->status !== 'confirmed') {
    //             throw new \Exception('Reservation not confirmed');
    //         }
    //     });
    // }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function discount()
    {
        return $this->belongsTo(DiscountCategory::class);
    }
}
