<?php

namespace Database\Seeders;

use App\Models\Theater;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Theater::factory()->count(10)->create();

        Theater::create([
           'name' => 'Example Theater',
            'region' => 'Region A',
            'city' => 'City A',
            'address' => '123 Example St, City A, Country',
            'phone' => '1234567890',
            'email' => 'theater@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Theater::create([
            'name' => 'Example Theater 2',
            'region' => 'Region B',
            'city' => 'City B',
            'address' => '456 Example St, City B, Country',
            'phone' => '0987654321',
            'email' => 'theater2@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Theater::create([
            'name' => 'Grand Cinema',
            'region' => 'Region C',
            'city' => 'City C',
            'address' => '789 Grand Ave, City C, Country',
            'phone' => '1122334455',
            'email' => 'info@grandcinema.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Theater::create([
            'name' => 'Star Theater',
            'region' => 'Region D',
            'city' => 'City D',
            'address' => '101 Star Rd, City D, Country',
            'phone' => '2233445566',
            'email' => 'contact@startheater.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Theater::create([
            'name' => 'Cinema Palace',
            'region' => 'Region E',
            'city' => 'City E',
            'address' => '202 Palace Blvd, City E, Country',
            'phone' => '3344556677',
            'email' => 'tickets@cinemapalace.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Theater::create([
            'name' => 'Movieplex',
            'region' => 'Region F',
            'city' => 'City F',
            'address' => '303 Movie St, City F, Country',
            'phone' => '4455667788',
            'email' => 'support@movieplex.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Theater::create([
            'name' => 'Silver Screen',
            'region' => 'Region G',
            'city' => 'City G',
            'address' => '404 Screen Lane, City G, Country',
            'phone' => '5566778899',
            'email' => 'hello@silverscreen.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
