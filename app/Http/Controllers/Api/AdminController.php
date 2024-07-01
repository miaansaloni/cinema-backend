<?php

namespace App\Http\Controllers\Api;

use App\Models\Hall;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Showtime;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\DiscountCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Ensure the user is an admin.
     */
    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || $user->user_type !== 'admin') {
            abort(403, 'Access denied');
        }
    }

   //////// Movies Management ////////

    public function storeMovie(Request $request)
    {
        $this->authorizeAdmin();
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'director' => 'required|string|max:100',
            'cast' => 'required|string',
            'rating' => 'required|string|max:10',
            'trailer_url' => 'required|string|url|max:255',
            'poster_url' => 'required|string|url|max:255',
            'release_date' => 'required|date',
            'days_in_theaters' => 'required|integer|min:1',
        ]);
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function updateMovie(Request $request, Movie $movie)
    {
        $this->authorizeAdmin();
        $request->validate([
            'title' => 'string|max:100',
            'description' => 'string',
            'duration' => 'integer|min:1',
            'director' => 'string|max:100',
            'cast' => 'string',
            'rating' => 'string|max:10',
            'trailer_url' => 'string|url|max:255',
            'poster_url' => 'string|url|max:255',
            'release_date' => 'sometimes|date',
            'days_in_theaters' => 'sometimes|integer|min:1',
        ]);
        $movie->update($request->all());
        return response()->json($movie, 200);
    }

    public function destroyMovie(Movie $movie)
    {
        $this->authorizeAdmin();
        $movie->delete();
        return response()->json(null, 204);
    }

    /////// Showtimes Management ///////
 
     public function createShowtime(Request $request)
     {
         $this->authorizeAdmin();
         $request->validate([
             'movie_id' => 'required|exists:movies,id',
             'hall_id' => 'required|exists:halls,id',
             'start_time' => 'required|date_format:Y-m-d H:i:s',
         ]);
         $showtime = Showtime::create($request->all());
         return response()->json($showtime, 201);
     }
 
     public function updateShowtime(Request $request, Showtime $showtime)
     {
         $this->authorizeAdmin();
         $request->validate([
             'movie_id' => 'exists:movies,id',
             'hall_id' => 'exists:halls,id',
             'start_time' => 'date_format:Y-m-d H:i:s',
         ]);
         $showtime->update($request->all());
         return response()->json($showtime, 200);
     }
 
     public function destroyShowtime(Showtime $showtime)
     {
         $this->authorizeAdmin();
         $showtime->delete();
         return response()->json(null, 204);
     }

    /////// Discount Categories Management ///////

    public function createDiscountCategory(Request $request)
    {
        $this->authorizeAdmin();
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'discount_percentage' => 'required|numeric|between:0,100',
            'condition' => 'required|string',
        ]);
        $discountCategory = DiscountCategory::create($request->all());
        return response()->json($discountCategory, 201);
    }

    public function updateDiscountCategory(Request $request, DiscountCategory $discountCategory)
    {
        $this->authorizeAdmin();
        $request->validate([
            'name' => 'string|max:50',
            'description' => 'string',
            'discount_percentage' => 'numeric|between:0,100',
            'condition' => 'string',
        ]);
        $discountCategory->update($request->all());
        return response()->json($discountCategory, 200);
    }

    public function destroyDiscountCategory(DiscountCategory $discountCategory)
    {
        $this->authorizeAdmin();
        $discountCategory->delete();
        return response()->json(null, 204);
    }

    /////// Genre Movie Association ///////

     public function attachGenreToMovie(Request $request, Movie $movie)
     {
         $this->authorizeAdmin();
         $request->validate([
             'genre_id' => 'required|exists:genres,id',
         ]);
         $movie->genres()->attach($request->genre_id);
         return response()->json($movie->genres()->get(), 201);
     }
 
     public function detachGenreFromMovie(Movie $movie, Genre $genre)
     {
         $this->authorizeAdmin();
         $movie->genres()->detach($genre->id);
         return response()->json($movie->genres()->get(), 200);
     }


    /////// RESERVATION STATUS MANAGEMENT ///////
     public function updateReservationStatus(Request $request, Reservation $reservation)
    {
        $this->authorizeAdmin();
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,cancelled', // Assumi che questi siano i valori possibili
        ]);
        $reservation->update(['status' => $request->status]);
        return response()->json($reservation, 200);
    }

   
}
