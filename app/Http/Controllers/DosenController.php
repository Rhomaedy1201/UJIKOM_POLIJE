<?php

namespace App\Http\Controllers;

use App\Repositories\DosenRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\RuntimeException;

class DosenController extends Controller
{
    protected $dosen;

    public function __construct(DosenRepository $dosenRepository) 
    {
        $this->dosen = $dosenRepository;
    }
    public function index()
    {
        $dosen = $this->dosen->index();
        // dd($dosen);
        return view('pages.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('pages.dosen.create');
    }

    public function store(Request $request)
    {
        try {
            $this->dosen->store($request->all());
            return redirect()->route('dosen')->with('success', 'Data dosen berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->route('dosen')->withErrors($e->validator)->withInput();
        }
    }

    public function edit(string $id)
    {
        $dosen = $this->dosen->find($id);
        return view('pages.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = $this->dosen->find($id);

        try {
            $this->dosen->update($mahasiswa, $request->all());
            return redirect()->route('dosen')->with('success', 'Data dosen berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->route('dosen')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('dosen')->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->dosen->delete($id);
            return redirect()->route('dosen')->with('success', 'Data dosen berhasil dihapus!');
        } catch (\RuntimeException $e) {
            return redirect()->route('dosen')->with('error', $e->getMessage());
        }
    }
}
