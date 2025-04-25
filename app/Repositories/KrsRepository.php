<?php

namespace App\Repositories;

use App\Models\Krs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class KrsRepository
{
    protected $krs;

    public function __construct(Krs $krs)
    {
        $this->krs = $krs;
    }

    public function index()
    {
        return $this->krs->all();
    }

    public function find($id)
    {
        return $this->krs->findOrFail($id);
    }

    public function store($data)
    {
        // dd($data);
        $validator = Validator::make($data, [
            'nim' => 'required|exists:mahasiswa,nim',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->krs->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data krs: " . $e->getMessage());
        }
    }
    public function update($id, $data)
    {
        
        $validator = Validator::make($data, [
            'nim' => 'required|exists:mahasiswa,nim',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            $krs = $this->krs->findOrFail($id);
            $krs->update($validator->validated());
            return $krs;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal memperbarui data krs: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $krs = $this->krs->findOrFail($id);
        try {
            $krs->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data krs: " . $e->getMessage());
        }
    }
}