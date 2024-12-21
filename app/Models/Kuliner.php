<?php

namespace App\Models;

use App\Models\Outlet;
use App\Models\KategoriKuliner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kuliner extends Model
{
    // deklarasi tabel
    public $table = 'kuliner';

    //tipe data harus yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'nama',
        'id_outlet',
        'id_kategori_kuliner',
        'deskripsi',
        'harga',
        'foto',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
    public function kategori_kuliner()
    {
        return $this->belongsTo(KategoriKuliner::class, 'id_kategori_kuliner');
    }
}
