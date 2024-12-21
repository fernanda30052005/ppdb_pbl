<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBooking extends Model
{
    // deklarasi tabel
    public $table = 'kategori_bookings';

    //tipe data harus yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'id_kategori_booking',
    ];

    public function kuliner()
    {
        return $this->hasMany(Booking::class, 'id_kategori_booking');
    }
}
