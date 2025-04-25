<?php

namespace App\Repositories;

use App\Models\Ruang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RuangRepository
{
    protected $model;

    public function __construct(Ruang $ruang)
    {
        $this->model = $ruang;
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
            'nama_ruang' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->model->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data ruangan: " . $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        $validator = Validator::make($data, [
            'nama_ruang' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->model->where('id', $id)->update(
                [
                    'nama_ruang' => $data['nama_ruang'],
                ]
            );
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal Merubah Ruangan: " . $e->getMessage());
        }
    }

    public function delete(string $id)
    {
        $ruang = $this->model->findOrFail($id);

        try {
            $ruang->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data ruangan: " . $e->getMessage());
        }
    }


}