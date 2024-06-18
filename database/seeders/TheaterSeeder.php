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
            'address' => '123 Example St, City, Country',
            'phone' => '1234567890',
            'email' => 'theater@example.com',
        ]);

        Theater::create([
            'name' => 'Example Theater 2',
            'address' => '456 Example St, City, Country',
            'phone' => '0987654321',
            'email' => 'theater2@example.com',
        ]);
    }
}
