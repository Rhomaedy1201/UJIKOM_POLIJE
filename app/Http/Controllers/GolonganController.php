<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Repositories\GolonganRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GolonganController extends Controller
{
    protected $param;

    public function __construct(GolonganRepository $golongan)
    {
        $this->param = $golongan;
    }

    public function index()
    {
        $golongan = $this->param->index();
        return view("pages.golongan.index", compact("golongan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.golongan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->param->store($request->all());
            return redirect()->route('golongan')->with('success', 'Data Golongan berhasil ditambahkan!');
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
        $golongan = $this->param->find($id);
        return view("pages.golongan.edit", compact("golongan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->param->update($request->all(), $id);
            return redirect()->route('golongan')->with('success', 'Data Golongan berhasil diubah!');
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
            return redirect()->route('golongan')->with('success', 'Data Golongan berhasil hapus');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
