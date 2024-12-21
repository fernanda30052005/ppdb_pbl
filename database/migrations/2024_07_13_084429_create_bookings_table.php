<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user')->nullable()->index('fk_bookings_to_users');
            $table->foreignId('id_kategori_booking')->nullable()->index('fk_bookings_to_kategori_bookings');
            $table->enum('status', ['pengajuan', 'diterima','ditolak'])->default('pengajuan');

            $table->string('nama_kegiatan');
            $table->date('tanggal_booking');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('keterangan')->nullable();
            $table->text('keterangan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
