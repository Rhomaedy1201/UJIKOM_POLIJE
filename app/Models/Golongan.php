<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = "golongan";

    protected $fillable = [
        "id",
        "nama_gol"
    ];
}
