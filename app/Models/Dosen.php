<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";

    protected $fillable = [
        "nip",
        "nama",
        "alamat",
        "no_hp"
    ];
}
