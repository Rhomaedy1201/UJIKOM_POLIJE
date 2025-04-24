<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Krs;

class KrsSeeder extends Seeder
{
    public function run()
    {
        Krs::insert([
            ['nim' => '2021001', 'kode_mk' => 'MK001'],
            ['nim' => '2021002', 'kode_mk' => 'MK002'],
        ]);
    }
}
