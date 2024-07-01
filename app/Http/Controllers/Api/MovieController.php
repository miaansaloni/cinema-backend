<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $movies = Movie::with(['genres'])->get();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::with('genres')->find($id);
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
        // $movie = Movie::find($id);

        // if (!$movie) {
        //     return response()->json(['message' => 'Movie not found'], 404);
        // }

        // $validator = Validator::make($request->all(), [
        //     'title' => 'string|max:100', 
        //     'description' => 'string',
        //     'duration' => 'integer',
        //     'director' => 'string|max:100',
        //     'cast' => 'string',
        //     'rating' => 'integer|max:10',
        //     'trailer_url' => 'string|max:255|url',
        //     'poster_url' => 'string|max:255|url',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        // $movie->update($request->all());

        // return response()->json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
