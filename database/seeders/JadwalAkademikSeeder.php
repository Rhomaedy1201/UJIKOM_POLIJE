<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalAkademik;

class JadwalAkademikSeeder extends Seeder
{
    public function run()
    {
        JadwalAkademik::insert([
            ['hari' => 'senin', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'selasa', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'rabu', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'kamis', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'jumat', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'sabtu', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'minggu', 'kode_mk' => 'MK002', 'id_ruang' => 1, 'id_gol' => 1],

            ['hari' => 'senin', 'kode_mk' => 'MK001', 'id_ruang' => 2, 'id_gol' => 2],
            ['hari' => 'selasa', 'kode_mk' => 'MK001', 'id_ruang' => 2, 'id_gol' => 2],
            ['hari' => 'rabu', 'kode_mk' => 'MK001', 'id_ruang' => 2, 'id_gol' => 2],
            ['hari' => 'kamis', 'kode_mk' => 'MK001', 'id_ruang' => 2, 'id_gol' => 2],
            ['hari' => 'jumat', 'kode_mk' => 'MK001', 'id_ruang' => 2, 'id_gol' => 2],
            ['hari' => 'sabtu', 'kode_mk' => 'MK001', 'id_ruang' => 2, 'id_gol' => 2],
            ['hari' => 'minggu', 'kode_mk' => 'MK002', 'id_ruang' => 2, 'id_gol' => 2],
        ]);
    }
}
