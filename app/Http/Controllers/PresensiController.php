<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use App\Models\PresensiAkademik;
use App\Repositories\PresensiRepository;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    protected $param;

    public function __construct(PresensiRepository $presensiRepository)
    {
        $this->param = $presensiRepository;
    }
    public function index()
    {
        $days = [
            'Sunday' => 'minggu',
            'Monday' => 'senin',
            'Tuesday' => 'selasa',
            'Wednesday' => 'rabu',
            'Thursday' => 'kamis',
            'Friday' => 'jumat',
            'Saturday' => 'sabtu',
        ];

        $jadwal = [];
        $user = Auth::user();
        $tanggal = now()->format("Y-m-d");
        $hariInggris = now()->format('l');
        $hari = $days[$hariInggris];

        $presensiExists = PresensiAkademik::where(function ($q) use ($user, $tanggal, $hari) {
            $q->where("nim", $user->nim)
                ->where('tanggal', $tanggal)
                ->where('hari', $hari);
        })->exists();

        if ($presensiExists) {
            $jadwal = [];
        } else {
            $jadwal = JadwalAkademik::with(['golongan', 'matakuliah'])
                ->where('id_gol', $user->id_gol)
                ->where('hari', $hari) // validasi tambahan: hanya ambil jadwal sesuai hari ini
                ->get();
        }

        return view("pages.presensi.index", compact("jadwal"));
    }

    public function store(Request $request)
    {

    }

}
