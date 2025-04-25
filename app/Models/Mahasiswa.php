<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $table = "mahasiswa";

    protected $fillable = [
        "nim",
        "nama",
        "alamat",
        "no_hp",
        "semester",
        "password",
        "id_gol",
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol', 'id');
    }
}
