<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutti i generi con i film associati
        return response()->json(Genre::with('movies')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        // Carica i film associati a questo genere
        $genre->load('movies');
        return response()->json($genre);
    }

}
