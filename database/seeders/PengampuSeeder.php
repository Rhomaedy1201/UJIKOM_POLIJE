<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengampu;

class PengampuSeeder extends Seeder
{
    public function run()
    {
        Pengampu::insert([
            ['kode_mk' => 'MK001', 'nip' => '198012312001'],
            ['kode_mk' => 'MK002', 'nip' => '197812312002'],
        ]);
    }
}
