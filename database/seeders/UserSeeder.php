<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'birthday' => '1980-01-01',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'phone' => '1234567890',
            'address' => '123 Admin Street',
            'user_type' => 'admin',
            'email_verified_at' => now(),
        ]);
        User::create([
            'first_name' => 'User',
            'last_name' => 'Example',
            'birthday' => '2001-01-01',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), 
            'phone' => '49302926661',
            'address' => '123 User Street',
            'user_type' => 'user',
            'email_verified_at' => now(),
        ]);
        User::create([
            'first_name' => 'Mario',
            'last_name' => 'Rossi',
            'birthday' => '1995-05-15',
            'email' => 'mariorossi@example.com',
            'password' => Hash::make('password123'),
            'phone' => '5551234567',
            'address' => '456 Elm Street',
            'user_type' => 'user',
            'email_verified_at' => now(),
        ]);
        User::create([
            'first_name' => 'Elisa',
            'last_name' => 'Gentile',
            'birthday' => '1988-10-20',
            'email' => 'elisagentile@example.com',
            'password' => Hash::make('qwerty'),
            'phone' => '5559876543',
            'address' => '789 Maple Avenue',
            'user_type' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
