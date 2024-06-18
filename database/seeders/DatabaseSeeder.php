<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DiscountCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            MovieSeeder::class, 
            GenreSeeder::class,
            TheaterSeeder::class,    
            HallSeeder::class,    
            SeatSeeder::class,    
            ShowtimeSeeder::class,    
            DiscountCategorySeeder::class,    
            ReservationSeeder::class,    
            GenreMovieSeeder::class,    
            TicketSeeder::class,    
        ]);
    }

}
