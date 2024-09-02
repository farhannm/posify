<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Farhan Maulana',
            'email' => 'farhan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat pengguna dengan peran user
        User::create([
            'name' => 'Ahmad Fauzan',
            'email' => 'ahmadfauzan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
