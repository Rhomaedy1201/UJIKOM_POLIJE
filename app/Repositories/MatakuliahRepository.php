<?php

namespace App\Repositories;

use App\Models\Matakuliah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MatakuliahRepository
{
    protected $matkul;

    public function __construct(Matakuliah $matkul)
    {
        $this->matkul = $matkul;
    }

    public function index()
    {
        return $this->matkul->all();
    }

    public function find(string $id)
    {
        return $this->matkul->findOrFail($id);
    }

    public function store(array $data)
    {
        $validator = Validator::make($data, [
            'kode_mk' => 'required|string|max:10|unique:matakuliah,kode_mk',
            'nama_mk' => 'required|string|max:100|unique:matakuliah,nama_mk',
            'sks' => 'required|integer|between:1,99',
            'semester' => 'required|integer|between:1,14',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->matkul->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data matakuliah: " . $e->getMessage());
        }
    }
    public function update(Matakuliah $matkul, array $data)
    {
        $validator = Validator::make($data, [
            'kode_mk' => 'required|string|max:10|unique:matakuliah,kode_mk,' . $matkul->id,
            'nama_mk' => 'required|string|max:100|unique:matakuliah,nama_mk,' . $matkul->id,
            'sks' => 'required|integer|between:1,99',
            'semester' => 'required|integer|between:1,14',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            $matkul->update($validator->validated());
            return $matkul;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal memperbarui data matakuliah: " . $e->getMessage());
        }
    }

    public function delete(string $id)
    {
        $matkul = $this->matkul->findOrFail($id);

        try {
            $matkul->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data matakuliah: " . $e->getMessage());
        }
    }
}