<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed regular users
        DB::table('kategori_kuliner')->insert([
            ['nama' => 'Makanan'],
            ['nama' => 'Minuman'],
            ['nama' => 'Lainnya'],
        ]);
        DB::table('kategori_bookings')->insert([
            ['nama' => 'Acara'],
            ['nama' => 'Musik'],
            ['nama' => 'Lainnya'],
        ]);
    }
}
