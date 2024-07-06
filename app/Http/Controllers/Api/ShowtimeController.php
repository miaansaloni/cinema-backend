<?php

namespace App\Http\Controllers\Api;

use App\Models\Showtime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShowtimeRequest;
use App\Http\Requests\UpdateShowtimeRequest;

class ShowtimeController extends Controller
{

    public function index()
    {
        $showtimes = Showtime::with(['movie', 'hall'])->get();
        return response()->json($showtimes);
    }
}
