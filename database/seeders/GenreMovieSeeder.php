<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class GenreMovieSeeder extends Seeder
{
    public function run()
    {
        // Prendiamo tutti i film e tutti i generi
        $movies = Movie::all();
        $genres = Genre::all();

        // Popolazione della tabella pivot con collegamenti casuali
        foreach ($movies as $movie) {
            $randomGenres = $genres->random(rand(1, 3))->pluck('id')->toArray();
            $movie->genres()->attach($randomGenres);
        }
    }
}
