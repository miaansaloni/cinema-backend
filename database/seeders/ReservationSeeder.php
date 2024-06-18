<?php

namespace Database\Seeders;

use App\Models\Seat;
use App\Models\User;
use App\Models\Showtime;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reservation::factory()->count(20)->create();
        Reservation::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'showtime_id' => Showtime::inRandomOrder()->first()->id,
            'seat_id' => Seat::inRandomOrder()->first()->id,
            'status' => 'confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Reservation::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'showtime_id' => Showtime::inRandomOrder()->first()->id,
            'seat_id' => Seat::inRandomOrder()->first()->id,
            'status' => 'pending', // Esempio di stato prenotazione diverso
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
