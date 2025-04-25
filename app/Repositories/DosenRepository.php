<?php

namespace App\Repositories;

use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DosenRepository 
{
    protected $dosen;

    public function __construct(Dosen $dosen)
    {
        $this->dosen = $dosen;
    }

    public function index()
    {
        return $this->dosen->all();
    }
    public function find(string $id)
    {
        return $this->dosen->findOrFail($id);
    }
    public function store( array $data )
    {
        $validator = Validator::make($data, [
            'nip' => 'required|string|size:18|unique:dosen,nip',
            'nama' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);     

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->dosen->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data dosen: " . $e->getMessage());
        }
    }

    public function update(Dosen $dosen, array $data)
    {
        $validator = Validator::make($data, [
            'nip' => 'required|string|size:18|unique:dosen,nip,' . $dosen->id,
            'nama' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            $dosen->update($validator->validated());
            return $dosen;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal memperbarui data dosen: " . $e->getMessage());
        }
    }

    public function delete(string $id)
    {
        $dosen = $this->dosen->findOrFail($id);

        try {
            $dosen->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data dosen: " . $e->getMessage());
        }
    }

}