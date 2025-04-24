<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        Mahasiswa::insert([
            ['nim' => '2021001', 'nama' => 'Andi', 'alamat' => 'Jl. A', 'no_hp' => '0811111111', 'semester' => 4, 'id_gol' => 1],
            ['nim' => '2021002', 'nama' => 'Siti', 'alamat' => 'Jl. B', 'no_hp' => '0822222222', 'semester' => 3, 'id_gol' => 2],
        ]);
    }
}
