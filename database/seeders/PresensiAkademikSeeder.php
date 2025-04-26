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
            ['hari' => 'Selasa', 'tanggal' => '2025-04-22', 'status_kehadiran' => 'alpa', 'nim' => '2021001', 'kode_mk' => 'MK002'],
            ['hari' => 'Rabu', 'tanggal' => '2025-04-23', 'status_kehadiran' => 'izin', 'nim' => '2021001', 'kode_mk' => 'MK001'],
            ['hari' => 'Senin', 'tanggal' => '2025-04-21', 'status_kehadiran' => 'hadir', 'nim' => '2021002', 'kode_mk' => 'MK001'],
            ['hari' => 'Selasa', 'tanggal' => '2025-04-22', 'status_kehadiran' => 'alpa', 'nim' => '2021002', 'kode_mk' => 'MK002'],
            ['hari' => 'Rabu', 'tanggal' => '2025-04-23', 'status_kehadiran' => 'izin', 'nim' => '2021002', 'kode_mk' => 'MK001'],
        ]);
    }
}
