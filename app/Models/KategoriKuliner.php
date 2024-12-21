<?php

namespace App\Models;

use App\Models\Kuliner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriKuliner extends Model
{
    // deklarasi tabel
    public $table = 'kategori_kuliner';

    //tipe data harus yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'id_kategori_kuliner',
    ];

    public function kuliner()
    {
        return $this->hasMany(Kuliner::class, 'id_kategori_kuliner');
    }
}
