<?php

namespace App\Http\Controllers\Api;

// use App\Models\Ticket;
use App\Models\Seat;
use App\Models\Showtime;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    private function authorizeUser()
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'User not authenticated');
        }

        if ($user->user_type !== 'user') {
            abort(403, 'Access denied');
        }
    }
    public function getUserTickets()
    {
        // // Ottieni l'utente loggato
        // $user = Auth::user();

        // // Recupera i ticket dell'utente loggato
        // $tickets = Ticket::whereHas('reservation', function($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // })->get();

        // return response()->json($tickets);
    }
    
    public function getShowtimeSeats($id)
    {
        // $this->authorizeUser();

        $showtime = Showtime::findOrFail($id);
        $seats = Seat::where('hall_id', $showtime->hall_id)->get();

        return response()->json($seats);
    }
}
