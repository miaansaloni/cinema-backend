<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Showtime;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\DiscountCategory;
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

    public function indexMovies()
    {
        $this->authorizeAdmin();
        $movies = Movie::all();
        return response()->json($movies);
    }

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
        ]);
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function showMovie(Movie $movie)
    {
        $this->authorizeAdmin();
        return response()->json($movie);
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

     public function indexShowtimes()
     {
         $this->authorizeAdmin();
         $showtimes = Showtime::all();
         return response()->json($showtimes);
     }
 
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

     public function showShowtime(Showtime $showtime)
     {
         $this->authorizeAdmin();
         return response()->json($showtime);
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

    public function indexDiscountCategories()
    {
        $this->authorizeAdmin();
        $discountCategories = DiscountCategory::all();
        return response()->json($discountCategories);
    }

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

    public function showDiscountCategory(DiscountCategory $discountCategory)
    {
        $this->authorizeAdmin();
        return response()->json($discountCategory);
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

    //  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> DA FINIRE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
      /////// Reservations ///////
    //  public function indexReservations()
    //  {
    //      $this->authorizeAdmin();
    //      $reservations = Reservation::all();
    //      return response()->json($reservations);
    //  }

    //  public function showReservation($id)
    // {
    //     $this->authorizeAdmin();
    //     $reservation = Reservation::findOrFail($id);
    //     return response()->json($reservation);
    // }

    // public function updateReservation(UpdateReservationRequest $request, $id)
    // {
    //     $this->authorizeAdmin();
    //     $reservation = Reservation::findOrFail($id);

    //     // Validazione dei dati
    //     $validatedData = $request->validated();

    //     // Aggiornamento della prenotazione
    //     $reservation->update($validatedData);

    //     return response()->json($reservation);
    // }

    // public function deleteReservation($id)
    // {
    //     $this->authorizeAdmin();
    //     $reservation = Reservation::findOrFail($id);
    //     $reservation->delete();

    //     return response()->json(null, 204);
    // }





    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> IN FORSE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    //////// Theaters Management ////////

    // public function indexTheaters()
    // {
    //     $this->authorizeAdmin();
    //     $theaters = Theater::all();
    //     return response()->json($theaters);
    // }

    // public function storeTheater(Request $request)
    // {
    //     $this->authorizeAdmin();
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'address' => 'required|string',
    //         'phone' => 'required|string|max:30',
    //         'email' => 'required|string|email|max:100',
    //     ]);
    //     $theater = Theater::create($request->all());
    //     return response()->json($theater, 201);
    // }

    // public function showTheater(Theater $theater)
    // {
    //     $this->authorizeAdmin();
    //     return response()->json($theater);
    // }

    // public function updateTheater(Request $request, Theater $theater)
    // {
    //     $this->authorizeAdmin();
    //     $request->validate([
    //         'name' => 'string|max:100',
    //         'address' => 'string',
    //         'phone' => 'string|max:30',
    //         'email' => 'string|email|max:100',
    //     ]);
    //     $theater->update($request->all());
    //     return response()->json($theater, 200);
    // }

    // public function destroyTheater(Theater $theater)
    // {
    //     $this->authorizeAdmin();
    //     $theater->delete();
    //     return response()->json(null, 204);
    // }

    //////// Halls Management ////////

    // public function indexHalls()
    // {
    //     $this->authorizeAdmin();
    //     $halls = Hall::all();
    //     return response()->json($halls);
    // }

    // public function storeHall(Request $request)
    // {
    //     $this->authorizeAdmin();
    //     $request->validate([
    //         'name' => 'required|string|max:50',
    //         'capacity' => 'required|integer|min:1',
    //         'theater_id' => 'required|exists:theaters,id',
    //     ]);
    //     $hall = Hall::create($request->all());
    //     return response()->json($hall, 201);
    // }

    // public function showHall(Hall $hall)
    // {
    //     $this->authorizeAdmin();
    //     return response()->json($hall);
    // }

    // public function updateHall(Request $request, Hall $hall)
    // {
    //     $this->authorizeAdmin();
    //     $request->validate([
    //         'name' => 'string|max:50',
    //         'capacity' => 'integer|min:1',
    //         'theater_id' => 'exists:theaters,id',
    //     ]);
    //     $hall->update($request->all());
    //     return response()->json($hall, 200);
    // }

    // public function destroyHall(Hall $hall)
    // {
    //     $this->authorizeAdmin();
    //     $hall->delete();
    //     return response()->json(null, 204);
    // }
}
