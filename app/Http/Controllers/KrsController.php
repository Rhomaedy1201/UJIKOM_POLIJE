<?php

namespace App\Http\Controllers;

use App\Repositories\KrsRepository;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\RuntimeException;

class KrsController extends Controller
{
    protected $krs;

    public function __construct(KrsRepository $krs)
    {
        $this->krs = $krs;
    }

    public function index()
    {
        $krs = $this->krs->index();
        // dd($krs);
        return view('pages.krs.index', compact('krs'));
    }
    public function create()
    {
        $data_mahasiswa = Mahasiswa::all();
        $data_matakuliah = Matakuliah::all();
        return view('pages.krs.create', compact('data_mahasiswa', 'data_matakuliah'));
    }
    public function store(Request $request)
    {
        try {
            $this->krs->store($request->all());
            return redirect()->route('krs')->with('success', 'Data krs berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function edit(string $id)
    {
        $krs = $this->krs->find($id);
        $data_mahasiswa = Mahasiswa::all();
        $data_matakuliah = Matakuliah::all();
        return view('pages.krs.edit', compact('krs', 'data_mahasiswa', 'data_matakuliah'));
    }
    public function update(Request $request, string $id)
    {
        try {
            $this->krs->update($id, $request->all());
            return redirect()->route('krs')->with('success', 'Data krs berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function destroy(string $id)
    {
        try {
            $this->krs->delete($id);
            return redirect()->route('krs')->with('success', 'Data krs berhasil dihapus.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
