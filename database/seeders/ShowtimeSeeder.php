<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Showtime::factory()->count(20)->create();

        $movies = Movie::all();
        $halls = Hall::all();

        foreach ($movies as $movie) {
            foreach ($halls as $hall) {
                // Creazione degli orari di proiezione per ogni film in ogni sala
                for ($i = 0; $i < 5; $i++) {
                    $startTime = Carbon::now()->addDays($i)->hour(rand(8, 20))->minute(0)->second(0);

                    Showtime::create([
                        'movie_id' => $movie->id,
                        'hall_id' => $hall->id,
                        'start_time' => $startTime,
                    ]);
                }
            }
        }
    }
}

// CARBON
// Sintassi chiara e leggibile: Permette di scrivere codice più comprensibile quando si manipolano date e orari.
// Metodi fluenti: Offre una serie di metodi per manipolare date e tempi in modo fluido, come ad esempio addDays(), subHours(), format(), diff(), etc.
// Supporto per i fusi orari: Gestisce automaticamente i fusi orari, permettendo di convertire le date da un fuso orario all'altro.
// Operazioni avanzate: Consente di eseguire operazioni come confronti tra date, calcoli di differenze di tempo, manipolazioni di formati di data, e altro ancora.

