<?php

namespace App\Http\Controllers;

use App\Repositories\RuangRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RuangController extends Controller
{
    protected $param;

    public function __construct(RuangRepository $ruang)
    {
        $this->param = $ruang;
    }

    public function index()
    {
        $ruang = $this->param->index();
        return view("pages.ruangan.index", compact("ruang"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.ruangan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->param->store($request->all());
            return redirect()->route('ruang')->with('success', 'Data ruang berhasil ditambahkan!');
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
        $ruang = $this->param->find($id);
        return view("pages.ruangan.edit", compact("ruang"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->param->update($request->all(), $id);
            return redirect()->route('ruang')->with('success', 'Data ruang berhasil diubah!');
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
            return redirect()->route('ruang')->with('success', 'Data ruang berhasil hapus');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\RuntimeException $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
