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
        Schema::table('kuliner', function (Blueprint $table) {
            $table->foreign('id_outlet', 'fk_kuliner_to_outlet')->references('id')->on('outlet')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategori_kuliner', 'fk_kuliner_to_kategori_kuliner')->references('id')->on('kategori_kuliner')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kuliner', function (Blueprint $table) {
            $table->dropForeign('fk_kuliner_to_outlet');
            $table->dropForeign('fk_kuliner_to_kategori_kuliner');
        });
    }
};
