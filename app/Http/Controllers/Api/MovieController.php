<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $movies = Movie::all();
    //     return response()->json($movies, 200);
    // }

    public function index()
    {
        $movies = Movie::with(['genres', 'showtimes'])->get();
        return response()->json($movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'duration' => 'required|integer',
            'director' => 'required|string|max:100',
            'cast' => 'required|string',
            'rating' => 'required|string|max:10',
            'trailer_url' => 'required|string|max:255',
            'poster_url' => 'required|string|max:255',
        ]);
        $movie = Movie::create($validated);

        return response()->json($movie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }
        return response()->json($movie, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'string|max:100', 
            'description' => 'string',
            'duration' => 'integer',
            'director' => 'string|max:100',
            'cast' => 'string',
            'rating' => 'integer|max:10',
            'trailer_url' => 'string|max:255|url',
            'poster_url' => 'string|max:255|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $movie->update($request->all());

        return response()->json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $movie->delete();

        return response()->json(['message' => 'Movie deleted successfully']);
    }
}
