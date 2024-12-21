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
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('id_user', 'fk_bookings_to_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategori_booking', 'fk_bookings_to_kategori_bookings')->references('id')->on('kategori_bookings')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('fk_outlet_to_users');
            $table->dropForeign('fk_bookings_to_kategori_bookings');
        });
    }
};
