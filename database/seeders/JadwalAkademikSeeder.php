<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalAkademik;

class JadwalAkademikSeeder extends Seeder
{
    public function run()
    {
        JadwalAkademik::insert([
            ['hari' => 'Senin', 'kode_mk' => 'MK001', 'id_ruang' => 1, 'id_gol' => 1],
            ['hari' => 'Selasa', 'kode_mk' => 'MK002', 'id_ruang' => 2, 'id_gol' => 2],
        ]);
    }
}
