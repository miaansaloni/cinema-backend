<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getUserTickets()
    {
        // Ottieni l'utente loggato
        $user = Auth::user();

        // Recupera i ticket dell'utente loggato
        $tickets = Ticket::whereHas('reservation', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return response()->json($tickets);
    }

    
    
}
