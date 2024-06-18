<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Http\Requests\StoreSeatRequest;
use App\Http\Requests\UpdateSeatRequest;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = Seat::all();
        return response()->json($seats);
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
    public function store(StoreSeatRequest $request)
    {
        $validatedData = $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'row' => 'required|string|max:10',
            'seat_number' => 'required|string|max:10',
            'is_available' => 'required|boolean',
        ]);

        $seat = Seat::create($validatedData);
        return response()->json($seat, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $seat = Seat::findOrFail($id);
        return response()->json($seat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeatRequest $request, $id)
    {
        $seat = Seat::findOrFail($id);
        
        $validatedData = $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'row' => 'required|string|max:10',
            'seat_number' => 'required|string|max:10',
            'is_available' => 'required|boolean',
        ]);

        $seat->update($validatedData);
        return response()->json($seat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return response()->json(null, 204);
    }
}
