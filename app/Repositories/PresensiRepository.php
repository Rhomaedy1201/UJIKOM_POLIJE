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

    public function index()
    {
        return $this->model->with(['matakuliah', 'golongan', 'ruang'])->get();
    }
    public function find(string $id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {

        $param = $data->validate([
            'hari' => 'required',
            'kode_mk' => 'required',
            'id_ruang' => 'required',
            'id_gol' => 'required',
        ]);

        try {
            return $this->model->create([
                'hari' => $param['hari'],
                'kode_mk' => $param['kode_mk'],
                'id_ruang' => $param['id_ruang'],
                'id_gol' => $param['id_gol'],
            ]);
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data jadwal akademik: " . $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        $param = $data->validate([
            'hari' => 'required',
            'kode_mk' => 'required',
            'id_ruang' => 'required',
            'id_gol' => 'required',
        ]);

        try {
            return $this->model->where('id', $id)->update(
                [
                    'hari' => $param['hari'],
                    'kode_mk' => $param['kode_mk'],
                    'id_ruang' => $param['id_ruang'],
                    'id_gol' => $param['id_gol'],
                ]
            );
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal Merubah jadwal akademik: " . $e->getMessage());
        }
    }

    public function delete(string $id)
    {
        $jadwalAkademik = $this->model->findOrFail($id);

        try {
            $jadwalAkademik->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data jadwal akademik: " . $e->getMessage());
        }
    }


}