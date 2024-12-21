<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'id_user' => '2',
            'id_kategori_booking' => '1',
            'nama_kegiatan' => 'Gebyar',
            'tanggal_booking' => '2024-07-24',
            'waktu_mulai' => '12.00',
            'waktu_selesai' => '13.00',
            'keterangan' => '13.00',
        ]);
    }
}
