<?php

namespace App\Repositories;

use App\Models\PresensiAkademik;

class PresensiRepository
{
    protected $model;

    public function __construct(PresensiAkademik $presensiAkademik)
    {
        $this->model = $presensiAkademik;
    }

    public function store($data)
    {
        return $this->model->create([
            "hari" => $data["hari"],
            "tanggal" => $data["tanggal"],
            "status_kehadiran" => $data["status_kehadiran"],
            "nim" => $data["nim"],
            "kode_mk" => $data["kode_mk"],
        ]);
    }
    

}