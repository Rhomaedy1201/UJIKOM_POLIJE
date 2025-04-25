<?php

namespace App\Repositories;

use App\Models\Pengampu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PengampuRepository
{
    protected $pengampu;

    public function __construct(Pengampu $pengampu)
    {
        $this->pengampu = $pengampu;
    }
    public function index()
    {
        return $this->pengampu->all();
    }
    public function find($id)
    {
        return $this->pengampu->findOrFail($id);
    }
    public function store($data)
    {
        // dd($data);
        $validator = Validator::make($data, [
            'nip' => 'required|exists:dosen,nip',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);
       
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->pengampu->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data pengampu: " . $e->getMessage());
        }
    }
    
    public function update($id, $data)
    {
        $validator = Validator::make($data, [
            'nip' => 'required|exists:dosen,nip',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            $pengampu = $this->pengampu->findOrFail($id);
            $pengampu->update($validator->validated());
            return $pengampu;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal memperbarui data pengampu: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $pengampu = $this->pengampu->findOrFail($id);
        try {
            $pengampu->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data pengampu: " . $e->getMessage());
        }
    }
}