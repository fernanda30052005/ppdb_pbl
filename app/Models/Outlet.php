<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    // deklarasi tabel
    public $table = 'outlet';

    //tipe data harus yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'nama',
        'id_user',
        'id_post',
        'id_outlet',
        'deskripsi',
        'foto',
        'kontak',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kuliner()
    {
        return $this->hasMany(Kuliner::class, 'id_outlet');
    }
}
