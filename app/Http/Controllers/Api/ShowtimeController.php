<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShowtimeRequest;
use App\Http\Requests\UpdateShowtimeRequest;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $showtimes = Showtime::all();
    //     return response()->json($showtimes);
    // }

    public function index()
    {
        $showtimes = Showtime::with(['movie', 'hall'])->get();
        return response()->json($showtimes);
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
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'hall_id' => 'required|exists:halls,id',
            'start_time' => 'required|date_format:Y-m-d H:i',
        ]);

        $showtime = Showtime::create($request->all());

        return response()->json($showtime, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        return response()->json($showtime);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowtimeRequest $request, Showtime $showtime)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'hall_id' => 'required|exists:halls,id',
            'start_time' => 'required|date_format:Y-m-d H:i',
        ]);

        $showtime->update($request->all());
        return response()->json($showtime, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return response()->json(null, 204);
    }
}
