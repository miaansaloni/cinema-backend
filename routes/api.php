<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\TheaterController;
use App\Http\Controllers\Api\ShowtimeController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\DiscountCategoryController;
use Illuminate\Support\Facades\Auth;

Route::get('/sanctum/csrf-cookie', function (Request $request) {
    return response()->json(['csrf_token' => csrf_token()]);
});
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:sanctum')->group(function () {
// });
// Route::middleware('auth:sanctum')->get('/user-profile', [UserController::class, 'getUserProfile']);

Route::name('api.v1.')
    ->prefix('v1')
    ->group(function () {

    //////////////////////////////////////////
    ////////////// ADMIN ROUTES \\\\\\\\\\\\\\
    //////////////////////////////////////////

    // Movies 
    Route::post('/movies', [AdminController::class, 'storeMovie']);
    Route::put('/movies/{movie}', [AdminController::class, 'updateMovie']);
    Route::delete('/movies/{movie}', [AdminController::class, 'destroyMovie']);

    // Showtimes 
    Route::post('/showtimes', [AdminController::class, 'createShowtime']);
    Route::put('/showtimes/{showtime}', [AdminController::class, 'updateShowtime']);
    Route::delete('/showtimes/{showtime}', [AdminController::class, 'destroyShowtime']);

    // Discount Categories 
    // Route::get('/discount-categories', [AdminController::class, 'indexDiscountCategories']);
    Route::post('/discount-categories', [AdminController::class, 'createDiscountCategory']);
    Route::put('/discount-categories/{discountCategory}', [AdminController::class, 'updateDiscountCategory']);
    Route::delete('/discount-categories/{discountCategory}', [AdminController::class, 'destroyDiscountCategory']);

    // Genre-Movie association 
    Route::post('/movies/{movie}/genres', [AdminController::class, 'attachGenreToMovie']);
    Route::delete('/movies/{movie}/genres/{genre}', [AdminController::class, 'detachGenreFromMovie']);

    // Update reservation status
    Route::put('/reservations/{reservation}/status', [AdminController::class, 'updateReservationStatus']);
    
    //////////////////////////////////////////
    ////////////// GET GENERALI //////////////
    //////////////////////////////////////////

    // TORNA UNO SPECIFICO CINEMA CON TUTTI I FILM ASSOCIATI, A CUI A LORO VOLTA SONO ASSOCIATI GLI ORARI DI PROIEZIONE E LE RISPETTIVE SALE
    Route::get('/theaters/{theater}/movies-with-showtimes', [TheaterController::class, 'moviesWithShowtimes']);
    Route::get('/theaters', [TheaterController::class, 'index']);

    // TUTTI I FILM CON RISPETTIVI GENERI ASSOCIATI
    Route::get('/movies', [MovieController::class, 'index']);

    // UN FILM SPECIFICO CON ASSOCIATI I GENERI
    Route::get('/movies/{id}', [MovieController::class, 'show']);
    Route::get('movies/{id}/theaters', [MovieController::class, 'theatersShowingMovie']);

    // TUTTE LE SALE E I CINEMA A CUI SONO ASSOCIATE
    Route::get('/halls', [HallController::class, 'index']);
    // SALA SPECIFICA CON TEATRO E SEDUTE ASSOCIATE
    Route::get('/halls/{hall}', [HallController::class, 'show']);

    //(SOLO PER SVILUPPO)
    //TUTTE LE PRENOTAZIONI
    Route::get('/reservations', [ReservationController::class, 'index']);

    // GENRES ROUTES 
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{genre}', [GenreController::class, 'show']);

    // DISCOUNTCATEGORIES
    Route::get('/discount-categories', [DiscountCategoryController::class, 'index']);
    Route::get('/discount-categories/{discount_category}', [DiscountCategoryController::class, 'show']);
   
    Route::get('reservations/{id}/seats', [UserController::class, 'getShowtimeSeats']);


});