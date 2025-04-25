<?php

namespace App\Http\Controllers;

use App\Repositories\MahasiswaRepository;
use Illuminate\Http\Request;
use App\Models\Golongan;
use Illuminate\Validation\ValidationException;
use Illuminate\RuntimeException;

class MahasiswaController extends Controller
{
    protected $params;

    public function __construct(MahasiswaRepository $mahasiswaRepository)
    {
        $this->params = $mahasiswaRepository;
    }
    public function index()
    {
        $mahasiswa = $this->params->index();

        return view("pages.mahasiswa.index", compact("mahasiswa"));
    }
    public function create()
    {
        $golongan = Golongan::all();

        return view("pages.mahasiswa.create", compact("golongan"));
    }
    public function store(Request $request)
    {
        try {
            $this->params->store($request->all());
            return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->route('mahasiswa')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('mahasiswa')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = $this->params->find($id);
        $golongan = Golongan::all();

        return view('pages.mahasiswa.edit', compact('mahasiswa', 'golongan'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = $this->params->find($id);

        try {
            $this->params->update($mahasiswa, $request->all());
            return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->route('mahasiswa')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('mahasiswa')->with('error', $e->getMessage())->withInput();
        }
    }


    public function destroy(string $id)
    {
        try {
            $this->params->delete($id);
            return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
        } catch (\RuntimeException $e) {
            return redirect()->route('mahasiswa')->with('error', $e->getMessage());
        }
    }

}
