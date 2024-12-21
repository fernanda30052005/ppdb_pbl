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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->text('riwayat_penyakit')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->text('prestasi_akademik')->nullable();
            $table->text('prestasi_non_akademik')->nullable();
            $table->enum('jurusan', ['TKJ', 'Akuntansi']);
            
            // Tempat Tinggal
            $table->text('alamat');
            $table->string('no_telepon');
            $table->enum('tinggal_dengan', ['orangtua', 'saudara', 'asrama', 'kost']);
            $table->string('jarak_ke_sekolah');
            
            // Pendidikan
            $table->string('sekolah_asal');
            $table->string('nomor_ijazah')->nullable();
            $table->date('tanggal_ijazah')->nullable();
            $table->string('nomor_un')->nullable();
            $table->string('nisn');
            $table->integer('lama_belajar');
            $table->string('pindahan_dari')->nullable();
            $table->text('alasan_pindah')->nullable();
            $table->date('tanggal_diterima');
            
            // Kegemaran
            $table->text('kegemaran_kesenian')->nullable();
            $table->text('kegemaran_olahraga')->nullable();
            $table->text('kegemaran_organisasi')->nullable();
            $table->text('kegemaran_lainnya')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
