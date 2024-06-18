<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'theater_id',
    ];

    // Define the relationship with the Theater model
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}
