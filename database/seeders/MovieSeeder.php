<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('movies')->truncate(); // Clear existing data

        // Movie::factory()->count(50)->create(); 
        Movie::create([
            'title' => 'The Matrix',
            'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            'duration' => 136,
            'director' => 'Lana Wachowski, Lilly Wachowski',
            'cast' => 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss',
            'language' => 'English',
            'rating' => 9,
            'trailer_url' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
            'poster_url' => 'https://example.com/posters/the_matrix.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Movie::create([
            'title' => 'Inception',
            'description' => 'A thief who enters the dreams of others to steal their secrets is offered a chance to have his criminal history erased as payment for a seemingly impossible task: "inception", the planting of an idea into a target\'s subconscious.',
            'duration' => 148,
            'director' => 'Christopher Nolan',
            'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page',
            'language' => 'English',
            'rating' => 8,
            'trailer_url' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
            'poster_url' => 'https://example.com/posters/inception.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // New entries
        Movie::create([
            'title' => 'Interstellar',
            'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
            'duration' => 169,
            'director' => 'Christopher Nolan',
            'cast' => 'Matthew McConaughey, Anne Hathaway, Jessica Chastain',
            'language' => 'English',
            'rating' => 9,
            'trailer_url' => 'https://www.youtube.com/watch?v=zSWdZVtXT7E',
            'poster_url' => 'https://example.com/posters/interstellar.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Movie::create([
            'title' => 'The Godfather',
            'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
            'duration' => 175,
            'director' => 'Francis Ford Coppola',
            'cast' => 'Marlon Brando, Al Pacino, James Caan',
            'language' => 'English',
            'rating' => 10,
            'trailer_url' => 'https://www.youtube.com/watch?v=sY1S34973zA',
            'poster_url' => 'https://example.com/posters/the_godfather.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
            'duration' => 152,
            'director' => 'Christopher Nolan',
            'cast' => 'Christian Bale, Heath Ledger, Aaron Eckhart',
            'language' => 'English',
            'rating' => 9,
            'trailer_url' => 'https://www.youtube.com/watch?v=EXeTwQWrcwY',
            'poster_url' => 'https://example.com/posters/the_dark_knight.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Movie::create([
            'title' => 'Pulp Fiction',
            'description' => 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
            'duration' => 154,
            'director' => 'Quentin Tarantino',
            'cast' => 'John Travolta, Uma Thurman, Samuel L. Jackson',
            'language' => 'English',
            'rating' => 9,
            'trailer_url' => 'https://www.youtube.com/watch?v=s7EdQ4FqbhY',
            'poster_url' => 'https://example.com/posters/pulp_fiction.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Movie::create([
            'title' => 'Schindler\'s List',
            'description' => 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.',
            'duration' => 195,
            'director' => 'Steven Spielberg',
            'cast' => 'Liam Neeson, Ralph Fiennes, Ben Kingsley',
            'language' => 'English',
            'rating' => 10,
            'trailer_url' => 'https://www.youtube.com/watch?v=gG22XNhtnoY',
            'poster_url' => 'https://example.com/posters/schindlers_list.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
