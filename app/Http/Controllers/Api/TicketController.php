<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Reservation;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreTicketRequest $request)
    // {
    //     $request->validate([
    //         'reservation_id' => 'required|exists:reservations,id',
    //         'base_price' => 'required|numeric|min:0',
    //         'discount_id' => 'nullable|exists:discount_categories,id',
    //         'final_price' => 'required|numeric|min:0',
    //         'purchase_date' => 'required|date',
    //     ]);

    //     // Check if the reservation is confirmed
    //     $reservation = Reservation::find($request->reservation_id);
    //     if ($reservation->status !== 'confirmed') {
    //         return response()->json(['error' => 'Reservation not confirmed'], 403);
    //     }

    //     // Create the ticket
    //     $ticket = Ticket::create($request->all());

    //     return response()->json($ticket, 201);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return response()->json($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'base_price' => 'required|numeric|min:0',
            'discount_id' => 'nullable|exists:discount_categories,id',
            'final_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        $ticket->update($request->all());
        return response()->json($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return response()->json(null, 204);
    }
}
