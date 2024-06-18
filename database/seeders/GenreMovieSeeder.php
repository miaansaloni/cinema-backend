<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class GenreMovieSeeder extends Seeder
{
    public function run()
    {
        // Otteniamo tutti i generi e tutti i film
        $genres = Genre::all();
        $movies = Movie::all();

        // Associamo ogni genere a più film in modo casuale
        foreach ($movies as $movie) {
            // Selezioniamo un numero casuale di generi da associare al film
            $randomGenres = $genres->random(random_int(1, 3)); // Associa da 1 a 3 generi per ogni film

            foreach ($randomGenres as $genre) {
                // Collegamento tra il genere e il film
                $movie->genres()->attach($genre->id);
            }
        }
    }
}
