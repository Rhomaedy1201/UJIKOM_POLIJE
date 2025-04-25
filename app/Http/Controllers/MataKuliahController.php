<?php

namespace App\Http\Controllers;

use App\Repositories\MatakuliahRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\RuntimeException;


class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $matakuliah;

    public function __construct(MatakuliahRepository $MatakuliahRepository)
    {
        $this->matakuliah = $MatakuliahRepository;
    }

    public function index()
    {
        $matakuliah = $this->matakuliah->index();
        // dd($matakuliah);
        return view('pages.matakuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $this->matakuliah->store($request->all());
            return redirect()->route('matakuliah')->with('success', 'Data matakuliah berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->route('matakuliah')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('matakuliah')->with('error', $e->getMessage())->withInput();
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
        $matkul = $this->matakuliah->find($id);
        return view('pages.matakuliah.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matkul = $this->matakuliah->find($id);
        try {
            $this->matakuliah->update($matkul, $request->all());
            return redirect()->route('matakuliah')->with('success', 'Data matakuliah berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->route('matakuliah')->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->route('matakuliah')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->matakuliah->delete($id);
            return redirect()->route('matakuliah')->with('success', 'Data matakuliah berhasil dihapus!');
        } catch (\RuntimeException $e) {
            return redirect()->route('matakuliah')->with('error', $e->getMessage())->withInput();
        }   
    }
}
