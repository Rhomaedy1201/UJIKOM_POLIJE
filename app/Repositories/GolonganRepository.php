<?php

namespace App\Repositories;

use App\Models\Golongan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GolonganRepository
{
    protected $model;

    public function __construct(Golongan $golongan)
    {
        $this->model = $golongan;
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
            'nama_gol' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->model->create($validator->validated());
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menambahkan data golongan: " . $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        $validator = Validator::make($data, [
            'nama_gol' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        try {
            return $this->model->where('id', $id)->update(
                [
                    'nama_gol' => $data['nama_gol'],
                ]
            );
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal Merubah Golongan: " . $e->getMessage());
        }
    }

    public function delete(string $id)
    {
        $golongan = $this->model->findOrFail($id);

        try {
            $golongan->delete();
            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Gagal menghapus data goloongan: " . $e->getMessage());
        }
    }


}