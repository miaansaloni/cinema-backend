<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // amministratore
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'birthday' => '1980-01-01',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Utilizza una password sicura in produzione
            'phone' => '1234567890',
            'address' => '123 Admin Street',
            'user_type' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Creiamo utenti fittizi
        User::factory()->count(2)->create();
    }
}
