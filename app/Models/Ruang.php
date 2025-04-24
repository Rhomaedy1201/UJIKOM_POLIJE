<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    protected $table = "ruang";

    protected $fillable = [
        "id",
        "nama_ruang",
    ];
}
