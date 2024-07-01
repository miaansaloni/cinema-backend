<?php

namespace App\Http\Controllers\Api;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $reservations = Reservation::all();
    //     return response()->json($reservations);
    // }

    public function index()
    {
       $reservations = Reservation::with(['user', 'showtime', 'seat'])->get();
      return response()->json($reservations);
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
    public function store(StoreReservationRequest $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'showtime_id' => 'required|exists:showtimes,id',
        //     'seat_id' => 'required|exists:seats,id',
        //     'status' => 'required|in:pending,confirmed,cancelled',
        // ]);

        // $reservation = Reservation::create($request->all());
        // return response()->json($reservation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        // return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'showtime_id' => 'required|exists:showtimes,id',
        //     'seat_id' => 'required|exists:seats,id',
        //     'status' => 'required|in:pending,confirmed,cancelled',
        // ]);

        // $reservation->update($request->all());
        // return response()->json($reservation, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // $reservation->delete();
        // return response()->json(null, 204);
    }
}
