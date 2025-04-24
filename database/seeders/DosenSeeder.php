<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run()
    {
        Dosen::insert([
            ['nip' => '198012312001', 'nama' => 'Dr. Budi', 'alamat' => 'Jl. Cempaka', 'no_hp' => '08111222333'],
            ['nip' => '197812312002', 'nama' => 'Prof. Ani', 'alamat' => 'Jl. Anggrek', 'no_hp' => '08233445566'],
        ]);
    }
}
