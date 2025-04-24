<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run()
    {
        Matakuliah::insert([
            ['kode_mk' => 'MK001', 'nama_mk' => 'Pemrograman Web', 'sks' => 3, 'semester' => 4],
            ['kode_mk' => 'MK002', 'nama_mk' => 'Basis Data', 'sks' => 3, 'semester' => 3],
        ]);
    }
}
