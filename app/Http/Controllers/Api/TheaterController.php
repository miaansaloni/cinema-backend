<?php

namespace App\Http\Controllers;

use App\Models\Theater;
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

    public function index()
    {
       $theaters = Theater::with('halls.showtimes')->get();
       return response()->json($theaters);
    }

    // lista dei film di un determinato cinema che include gli showtimes corrispondenti ai film in quel cinema specifico
    public function moviesWithShowtimes(Theater $theater)
    {
        $movies = $theater->halls()
                          ->with('showtimes.movie')
                          ->get()
                          ->pluck('showtimes')
                          ->flatten()
                          ->pluck('movie')
                          ->unique('id');
        return response()->json($movies);
    }
}
