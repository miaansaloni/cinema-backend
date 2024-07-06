<?php

namespace App\Http\Controllers\Api;

use App\Models\Hall;
use App\Http\Controllers\Controller;
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
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        // Carica il cinema e le seats associate 
        $hall = Hall::with('theater', 'seats')->find($hall->id);
        return response()->json($hall);
    }

}
