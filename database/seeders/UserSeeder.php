<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'fullname' => 'Farhan Maulana',
            'email' => 'farhan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'fullname' => 'Ahmad Fauzan',
            'email' => 'ahmadfauzan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'cashier',
        ]);

        User::create([
            'fullname' => 'Radja Restu',
            'email' => 'radjarestu@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'owner',
        ]);

        User::create([
            'fullname' => 'Hanif Ahmad',
            'email' => 'hanifahmad@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'cashier',
        ]);

        User::create([
            'fullname' => 'Azka Darajat',
            'email' => 'azkad123@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'owner',
        ]);

        User::create([
            'fullname' => 'Azka Darajat',
            'email' => 'hanifahmadnfl12@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'owner',
        ]);
    }
}
