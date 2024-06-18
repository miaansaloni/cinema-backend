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
    }
}
