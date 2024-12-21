<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // deklarasi tabel
    public $table = 'bookings';

    //tipe data harus yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_user',
        'id_kategori_booking',
        'nama_kegiatan',
        'tanggal_booking',
        'waktu_mulai',
        'waktu_selesai',
        'keterangan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function kategori_booking()
    {
        return $this->belongsTo(KategoriBooking::class, 'id_kategori_booking');
    }
}

