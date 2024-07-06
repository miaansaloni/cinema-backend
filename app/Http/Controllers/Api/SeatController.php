<?php

namespace App\Http\Controllers\Api;

use App\Models\Seat;
use App\Http\Controllers\Controller;
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
     * Display the specified resource.
     */
    public function show($id)
    {
        $seat = Seat::findOrFail($id);
        return response()->json($seat);
    }

}
