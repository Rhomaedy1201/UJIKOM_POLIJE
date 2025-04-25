<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Repositories\JadwalAkademikRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class JadwalAkademikController extends Controller
{
    protected $param;

    public function __construct(JadwalAkademikRepository $jadwal)
    {
        $this->param = $jadwal;
    }
    public function index()
    {
        $data = $this->param->index();
        return view("pages.jadwal_akademik.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matkul = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();
        return view("pages.jadwal_akademik.create", compact(["matkul", "ruang", "golongan"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->param->store($request);
            return redirect()->route('jadwal_akademik')->with('success', 'Data Jadwal Akademik berhasil ditambahkan!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
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
        $matkul = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();
        $jadwalAkademik = $this->param->find($id);
        return view("pages.jadwal_akademik.edit", compact(["jadwalAkademik", "matkul", "ruang", "golongan"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->param->update($request, $id);
            return redirect()->route('jadwal_akademik')->with('success', 'Data Jadwal Akademik berhasil diubah!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->param->delete($id);
            return redirect()->route('jadwal_akademik')->with('success', 'Data Jadwal Akademik berhasil dihapus!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
