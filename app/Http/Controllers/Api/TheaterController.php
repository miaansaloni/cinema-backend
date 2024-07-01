<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Showtime;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTheaterRequest;
use App\Http\Requests\UpdateTheaterRequest;

class TheaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return Theater::all();
    // }

    // public function index()
    // {
    //    $theaters = Theater::with('halls.showtimes')->get();
    //    return response()->json($theaters);
    // }

    // lista dei film di un determinato cinema che include gli showtimes corrispondenti ai film in quel cinema specifico
    public function moviesWithShowtimes(Theater $theater)
    {
        // Recupera i film con showtimes associati alle sale del cinema
        $movies = Movie::whereHas('showtimes', function($query) use ($theater) {
            $query->whereIn('hall_id', $theater->halls->pluck('id'));
        })->with(['showtimes' => function($query) use ($theater) {
            $query->whereIn('hall_id', $theater->halls->pluck('id'));
        }])->get();

        return response()->json($movies);
    }
}
