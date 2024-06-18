<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'row',
        'seat_number',
        'is_available',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
