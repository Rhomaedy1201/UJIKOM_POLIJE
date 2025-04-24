<?php

namespace App\Repositories;

use App\Models\Mahasiswa;
use App\Models\Golongan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MahasiswaRepository
{
    protected $model;

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->model = $mahasiswa;
    }

    public function index()
    {
        return $this->model->all();
    }
    public function find(string $id)
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $data)
    {
        $validator = Validator::make($data, [
            'nim' => 'required|string|size:9|unique:mahasiswa,nim',
            'nama' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'semester' => 'required|integer',
            'id_gol' => 'required|exists:golongan,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->model->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data mahasiswa: " . $e->getMessage());
        }
    }

    public function update(Mahasiswa $mahasiswa, array $data)
    {
        $validator = Validator::make($data, [
            'nim' => 'required|string|size:9|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'semester' => 'required|integer',
            'id_gol' => 'required|exists:golongan,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            $mahasiswa->update($validator->validated());
            return $mahasiswa;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal memperbarui data mahasiswa: " . $e->getMessage());
        }
    }
    public function delete(string $id)
    {
        $mahasiswa = $this->model->findOrFail($id);

        try {
            $mahasiswa->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data mahasiswa: " . $e->getMessage());
        }
    }


}