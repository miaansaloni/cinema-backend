<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HallController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DiscountCategoryController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user-profile', [UserController::class, 'getUserProfile']);

Route::name('api.v1.')
    ->prefix('v1')
    ->group(function () {

    //////////////////////////////////////////
    ////////////// ADMIN ROUTES \\\\\\\\\\\\\\
    //////////////////////////////////////////

    // Movies routes
    Route::get('/movies', [AdminController::class, 'indexMovies']);
    Route::post('/movies', [AdminController::class, 'storeMovie']);
    Route::get('/movies/{movie}', [AdminController::class, 'showMovie']);
    Route::put('/movies/{movie}', [AdminController::class, 'updateMovie']);
    Route::delete('/movies/{movie}', [AdminController::class, 'destroyMovie']);

    // Showtimes routes
    Route::get('/showtimes', [AdminController::class, 'indexShowtimes']);
    Route::post('/showtimes', [AdminController::class, 'createShowtime']);
    Route::get('/showtimes/{showtime}', [AdminController::class, 'showShowtime']);
    Route::put('/showtimes/{showtime}', [AdminController::class, 'updateShowtime']);
    Route::delete('/showtimes/{showtime}', [AdminController::class, 'destroyShowtime']);

    // Discount Categories routes
    // Route::get('/discount-categories', [AdminController::class, 'indexDiscountCategories']);
    Route::post('/discount-categories', [AdminController::class, 'createDiscountCategory']);
    Route::get('/discount-categories/{discountCategory}', [AdminController::class, 'showDiscountCategory']);
    Route::put('/discount-categories/{discountCategory}', [AdminController::class, 'updateDiscountCategory']);
    Route::delete('/discount-categories/{discountCategory}', [AdminController::class, 'destroyDiscountCategory']);

    // Genre-Movie association routes
    Route::post('/movies/{movie}/genres', [AdminController::class, 'attachGenreToMovie']);
    Route::delete('/movies/{movie}/genres/{genre}', [AdminController::class, 'detachGenreFromMovie']);

    // Update reservation status
    Route::put('/reservations/{reservation}/status', [AdminController::class, 'updateReservationStatus']);

    //////////////////////////////////////////
    /////// DISCOUNTCATEGORIES ROUTES \\\\\\\\
    //////////////////////////////////////////
    Route::get('/discount-categories', [DiscountCategoryController::class, 'index']);
    Route::get('/discount-categories/{discount_category}', [DiscountCategoryController::class, 'show']);

    //////////////////////////////////////////
    ///////////// GENRES ROUTES \\\\\\\\\\\\\\
    //////////////////////////////////////////
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{genre}', [GenreController::class, 'show']);

    // lista dei film di un determinato cinema che include gli showtimes corrispondenti ai film in quel cinema specifico
    Route::get('theaters/{theater}/movies', [TheaterController::class, 'moviesWithShowtimes']);
});













































// Route::middleware('auth:sanctum')->group(function () {
//     //////////// USER \\\\\\\\\\\\
//     Route::prefix('users')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('users.index');
//         Route::post('/', [UserController::class, 'store'])->name('users.store');
//         Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
//         Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
//         Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//         // Optional routes for creating and editing users
//         Route::get('/create', [UserController::class, 'create'])->name('users.create');
//         Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//     });

//      //////////// RESERVATIONS \\\\\\\\\\\\
//      Route::prefix('reservations')->group(function () {
//         Route::get('/', [ReservationController::class, 'index']);
//         Route::post('/', [ReservationController::class, 'store']);
//         Route::get('/{reservation}', [ReservationController::class, 'show']);
//         Route::put('/{reservation}', [ReservationController::class, 'update']);
//         Route::delete('/{reservation}', [ReservationController::class, 'destroy']);

//         // Optional routes for creating and editing reservations
//         Route::get('/create', [ReservationController::class, 'create']);
//         Route::get('/{reservation}/edit', [ReservationController::class, 'edit']);
//     });

//      //////////// TICKETS \\\\\\\\\\\\
//      Route::prefix('tickets')->group(function () {
//         Route::get('/', [TicketController::class, 'index']);
//         Route::post('/', [TicketController::class, 'store']);
//         Route::get('/{ticket}', [TicketController::class, 'show']);
//         Route::put('/{ticket}', [TicketController::class, 'update']);
//         Route::delete('/{ticket}', [TicketController::class, 'destroy']);
//     });
// });



// // Group API v1 routes
// Route::prefix('v1')->group(function () {
//     //////////// THEATERS \\\\\\\\\\\\
//     Route::prefix('theaters')->group(function () {
//         Route::get('/', [TheaterController::class, 'index']);
//         Route::post('/', [TheaterController::class, 'store']);
//         Route::get('/{theater}', [TheaterController::class, 'show']);
//         Route::put('/{theater}', [TheaterController::class, 'update']);
//         Route::delete('/{theater}', [TheaterController::class, 'destroy']);

//         // Optional routes for creating and editing theaters
//         Route::get('/create', [TheaterController::class, 'create']);
//         Route::get('/{theater}/edit', [TheaterController::class, 'edit']);
//     });

//     //////////// SHOWTIMES \\\\\\\\\\\\
//     Route::prefix('showtimes')->group(function () {
//         Route::get('/', [ShowtimeController::class, 'index']);
//         Route::post('/', [ShowtimeController::class, 'store']);
//         Route::get('/{showtime}', [ShowtimeController::class, 'show']);
//         Route::put('/{showtime}', [ShowtimeController::class, 'update']);
//         Route::delete('/{showtime}', [ShowtimeController::class, 'destroy']);

//         // Optional routes for creating and editing showtimes
//         Route::get('/create', [ShowtimeController::class, 'create']);
//         Route::get('/{showtime}/edit', [ShowtimeController::class, 'edit']);
//     });

//     //////////// SEATS \\\\\\\\\\\\
//     Route::prefix('seats')->group(function () {
//         Route::get('/', [SeatController::class, 'index']);
//         Route::post('/', [SeatController::class, 'store']);
//         Route::get('/{seat}', [SeatController::class, 'show']);
//         Route::put('/{seat}', [SeatController::class, 'update']);
//         Route::delete('/{seat}', [SeatController::class, 'destroy']);

//         // Optional routes for creating and editing seats
//         Route::get('/create', [SeatController::class, 'create']);
//         Route::get('/{seat}/edit', [SeatController::class, 'edit']);
//     });

//     //////////// MOVIES \\\\\\\\\\\\
//     Route::prefix('movies')->group(function () {
//         Route::get('/', [MovieController::class, 'index']);
//         Route::post('/', [MovieController::class, 'store']);
//         Route::get('/{movie}', [MovieController::class, 'show']);
//         Route::put('/{movie}', [MovieController::class, 'update']);
//         Route::delete('/{movie}', [MovieController::class, 'destroy']);

//         // Optional routes for creating and editing movies
//         Route::get('/create', [MovieController::class, 'create']);
//         Route::get('/{movie}/edit', [MovieController::class, 'edit']);
//     });

//     //////////// HALLS \\\\\\\\\\\\
//     Route::prefix('halls')->group(function () {
//         Route::get('/', [HallController::class, 'index']);
//         Route::post('/', [HallController::class, 'store']);
//         Route::get('/{hall}', [HallController::class, 'show']);
//         Route::put('/{hall}', [HallController::class, 'update']);
//         Route::delete('/{hall}', [HallController::class, 'destroy']);

//         // Optional routes for creating and editing halls
//         Route::get('/create', [HallController::class, 'create']);
//         Route::get('/{hall}/edit', [HallController::class, 'edit']);
//     });

//     //////////// GENRES \\\\\\\\\\\\
//     Route::prefix('genres')->group(function () {
//         Route::get('/', [GenreController::class, 'index']);
//         Route::post('/', [GenreController::class, 'store']);
//         Route::get('/{genre}', [GenreController::class, 'show']);
//         Route::put('/{genre}', [GenreController::class, 'update']);
//         Route::delete('/{genre}', [GenreController::class, 'destroy']);

//         // Optional routes for creating and editing genres
//         Route::get('/create', [GenreController::class, 'create']);
//         Route::get('/{genre}/edit', [GenreController::class, 'edit']);
//     });

//     //////////// DISCOUNT CATEGORIES \\\\\\\\\\\\
//     Route::prefix('discount-categories')->group(function () {
//         Route::get('/', [DiscountCategoryController::class, 'index']);
//         Route::post('/', [DiscountCategoryController::class, 'store']);
//         Route::get('/{discount_category}', [DiscountCategoryController::class, 'show']);
//         Route::put('/{discount_category}', [DiscountCategoryController::class, 'update']);
//         Route::delete('/{discount_category}', [DiscountCategoryController::class, 'destroy']);

//         // Optional routes for creating and editing discount categories
//         Route::get('/create', [DiscountCategoryController::class, 'create']);
//         Route::get('/{discount_category}/edit', [DiscountCategoryController::class, 'edit']);
//     });
// });
