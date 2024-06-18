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

        // // Creazione dell'utente admin
        // User::factory()->create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'User',
        //     'email' => 'admin@example.com',
        //     'user_type' => 'admin',
        //     'password' => bcrypt('password'), 
        //     // Gli altri campi vengono popolati dalla factory
        // ]);

        // // Creazione dell'utente standard
        // User::factory()->create([
        //     'first_name' => 'Standard',
        //     'last_name' => 'User',
        //     'email' => 'user@example.com',
        //     'user_type' => 'user',
        //     'password' => bcrypt('password'), 
        //     // Gli altri campi vengono popolati dalla factory
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
