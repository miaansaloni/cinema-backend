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
    public function index()
    {
        return Theater::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'default_values' => [
                'name' => '',
                'address' => '',
                'phone' => '',
                'email' => '',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTheaterRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:100|unique:theaters,email',
        ]);

        $theater = Theater::create($validated);
        return response()->json($theater, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Theater $theater)
    {
        return $theater;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theater $theater)
    {
        return response()->json([
            'theater' => $theater
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTheaterRequest $request, Theater $theater)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:100|unique:theaters,email,' . $theater->id,
        ]);

        $theater->update($validated);
        return response()->json($theater, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theater $theater)
    {
        $theater->delete();
        return response()->json(null, 204);
    }
}
