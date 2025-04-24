<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PresensiAkademik;

class PresensiAkademikSeeder extends Seeder
{
    public function run()
    {
        PresensiAkademik::insert([
            ['hari' => 'Senin', 'tanggal' => '2025-04-21', 'status_kehadiran' => 'hadir', 'nim' => '2021001', 'kode_mk' => 'MK001'],
            ['hari' => 'Selasa', 'tanggal' => '2025-04-22', 'status_kehadiran' => 'tidak', 'nim' => '2021002', 'kode_mk' => 'MK002'],
        ]);
    }
}
