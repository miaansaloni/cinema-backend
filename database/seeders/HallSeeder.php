<?php

namespace Database\Seeders;

use App\Models\Hall;
use App\Models\Theater;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hall::factory()->count(10)->create();

        $theaters = Theater::all();

        foreach ($theaters as $theater) {
            // Creazione di due sale per ciascun teatro
            Hall::create([
                'name' => 'Hall A',
                'capacity' => 100,
                'theater_id' => $theater->id,
            ]);

            Hall::create([
                'name' => 'Hall B',
                'capacity' => 80,
                'theater_id' => $theater->id,
            ]);

        }
    }
}
