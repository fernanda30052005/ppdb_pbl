<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed admin users
        DB::table('users')->insert([
            // admin
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('123456'), 'role' => 'admin'],
            // umkm
            // ['name' => 'Nendi Wiziadma', 'email' => 'nendimi3108@gmail.com', 'password' => Hash::make('123456'), 'role' => 'umkm'],
            // ['name' => 'Hari', 'email' => 'hari@gmail.com', 'password' => Hash::make('123456'), 'role' => 'user'],
        ]);

        // Seed regular users

    }
}
