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
            'rating' => 'R',
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
            'rating' => 'PG-13',
            'trailer_url' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
            'poster_url' => 'https://example.com/posters/inception.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
