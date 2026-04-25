<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'full_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'personal_email' => 'admin@gmail.com',
                'phone_number' => '1234567890',
                'profile_photo' => 'profile.jpg',
                'role' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
