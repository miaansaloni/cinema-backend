<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Hall::with('theater')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'default_values' => [
                'name' => '',
                'capacity' => 0,
                'theater_id' => null,
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'theater_id' => 'required|exists:theaters,id',
        ]);

        $hall = Hall::create($validated);
        return response()->json($hall, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        // Carica il teatro e le seats associate 
        $hall = Hall::with('theater', 'seats')->find($hall->id);
        return response()->json($hall);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        return response()->json([
            'hall' => $hall->load('theater')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'theater_id' => 'required|exists:theaters,id',
        ]);

        $hall->update($validated);
        return response()->json($hall, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        return response()->json(null, 204);
    }
}
