<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Seat;
use App\Models\User;
use App\Models\Showtime;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use App\Models\DiscountCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['confirmed', 'pending', 'cancelled', 'completed'];

        for ($i = 0; $i < 20; $i++) {
            $basePrice = rand(500, 1000) / 100; 

            // sconto casuale
            $discountId = null;
            if (rand(0, 1) == 1) { // 50% di probabilità di applicare sconto
                $discount = DiscountCategory::inRandomOrder()->first();
                $discountId = $discount ? $discount->id : null;
                $finalPrice = $discount ? $basePrice * (1 - ($discount->discount_percentage / 100)) : $basePrice;
            } else {
                $finalPrice = $basePrice;
            }

            Reservation::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'showtime_id' => Showtime::inRandomOrder()->first()->id,
                'seat_id' => Seat::inRandomOrder()->first()->id,
                'status' => $statuses[array_rand($statuses)],
                'base_price' => $basePrice,
                'discount_id' => $discountId,
                'final_price' => $finalPrice,
                'purchase_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

// class ReservationSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // Reservation::factory()->count(20)->create();
//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'confirmed',
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'pending',
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

//         // Nuove voci
//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'cancelled', 
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'completed', 
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'confirmed',
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'pending',
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

//         Reservation::create([
//             'user_id' => User::inRandomOrder()->first()->id,
//             'showtime_id' => Showtime::inRandomOrder()->first()->id,
//             'seat_id' => Seat::inRandomOrder()->first()->id,
//             'status' => 'completed',
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);
//     }
// }
