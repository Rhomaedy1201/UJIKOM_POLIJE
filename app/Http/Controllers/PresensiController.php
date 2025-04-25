<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    // protected $param;

    // public function __construct(JadwalAkademik $jadwalAkademik)
    // {
    //     $this->param = $jadwalAkademik;
    // }
    public function index()
    {
        return view("pages.presensi.index");
    }
}
