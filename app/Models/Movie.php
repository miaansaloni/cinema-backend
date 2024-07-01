<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'director',
        'cast',
        'rating',
        'trailer_url',
        'poster_url',
        'release_date', 
        'days_in_theaters' 
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}
