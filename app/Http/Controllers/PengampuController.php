<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Repositories\PengampuRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\RuntimeException;

class PengampuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $pengampu;

    public function __construct(PengampuRepository $pengampuRepository)
    {
        $this->pengampu = $pengampuRepository;
    }
    public function index()
    {
        $pengampu = $this->pengampu->index();
        // dd($data_dosen);
        // dd($data_matakuliah);
        return view('pages.pengampu.index', compact('pengampu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_dosen = Dosen::all();
        $data_matakuliah = Matakuliah::all();
        // dd($data_dosen);
        return view('pages.pengampu.create', compact('data_dosen', 'data_matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->pengampu->store($request->all());
            return redirect()->route('pengampu')->with('success', 'Data pengampu berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->route('pengampu')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('pengampu')->with('error', $e->getMessage())->withInput();
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
        $pengampu = $this->pengampu->find($id);
        $data_dosen = Dosen::all();
        $data_matakuliah = Matakuliah::all();
        return view('pages.pengampu.edit', compact('pengampu', 'data_dosen', 'data_matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengampu = $this->pengampu->find($id);
        try {
            $this->pengampu->update($id, $request->all());
            return redirect()->route('pengampu')->with('success', 'Data pengampu berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->route('pengampu')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('pengampu')->with('error', $e->getMessage())->withInput(); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->pengampu->delete($id);
            return redirect()->route('pengampu')->with('success', 'Data pengampu berhasil dihapus!');
        } catch (\RuntimeException $e) {
            return redirect()->route('pengampu')->with('error', $e->getMessage());
        }
    }
}
