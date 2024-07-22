<?php

namespace App\Http\Controllers\Api;

use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    

}
