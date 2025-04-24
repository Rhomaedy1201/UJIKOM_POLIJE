<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruang;

class RuangSeeder extends Seeder
{
    public function run()
    {
        Ruang::insert([
            ['id' => 1, 'nama_ruang' => 'Ruang 101'],
            ['id' => 2, 'nama_ruang' => 'Ruang 102'],
        ]);
    }
}
