<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'region', 'city', 'address', 'phone', 'email',
    ];
    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
}
