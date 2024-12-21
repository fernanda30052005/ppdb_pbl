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
        Schema::create('kuliner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_outlet')->nullable()->index('fk_kuliner_to_outlet');
            $table->foreignId('id_kategori_kuliner')->nullable()->index('fk_kuliner_to_kategori_kuliner');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuliner');
    }
};
