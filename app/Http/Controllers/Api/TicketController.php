<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    public function index()
    {
       $tickets = Ticket::with(['reservation', 'discount'])->get();
       return response()->json($tickets);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return response()->json($ticket);
    }

}
