<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Golongan;

class GolonganSeeder extends Seeder
{
    public function run()
    {
        Golongan::insert([
            ['id' => 1, 'nama_gol' => 'Golongan A'],
            ['id' => 2, 'nama_gol' => 'Golongan B'],
        ]);
    }
}
