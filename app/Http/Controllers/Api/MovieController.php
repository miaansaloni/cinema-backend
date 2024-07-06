<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::with(['genres'])->get();
        return response()->json($movies);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::with('genres')->find($id);
        
        if ($movie) {
            return response()->json($movie);
        } else {
            return response()->json(['message' => 'Film non trovato'], 404);
        }
    }

    public function theatersShowingMovie($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Film non trovato'], 404);
        }

        // Ottengo i cinema che proiettano il film
        $theaters = Showtime::where('movie_id', $id)
            ->with(['hall.theater']) 
            ->get()
            ->pluck('hall.theater')
            ->unique('id')
            ->values();

        return response()->json($theaters);
    }
}
