<?php

namespace Database\Seeders;

use App\Models\Hall;
use App\Models\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $halls = Hall::all();

        foreach ($halls as $hall) {
            // Creazione di posti per ogni sala
            for ($row = 'A'; $row <= 'Z'; $row++) {
                for ($seatNumber = 1; $seatNumber <= 10; $seatNumber++) {
                    Seat::create([
                        'hall_id' => $hall->id,
                        'row' => $row,
                        'seat_number' => $seatNumber,
                        'is_available' => true,
                    ]);
                }
            }
        }
    }
}
