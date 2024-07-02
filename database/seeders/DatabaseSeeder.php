<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\DiscountCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
