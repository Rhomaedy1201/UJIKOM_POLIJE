<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";

    protected $fillable = [
        "nim",
        "nama",
        "alamat",
        "no_hp",
        "semester",
        "id_gol",
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol', 'id');
    }
}
