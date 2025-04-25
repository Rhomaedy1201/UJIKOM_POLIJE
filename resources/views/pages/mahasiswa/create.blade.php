@extends('layouts.app')
@section('title', 'User')
@section('title2', 'User')
@section('titlePage', 'Tambah')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM">
                        </div>
                        <div class="col-lg-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="col-lg-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat"
                                placeholder="Masukkan Alamat">
                        </div>
                        <div class="col-lg-6">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp"
                                placeholder="Masukkan No HP">
                        </div>
                        <div class="col-lg-6">
                            <label for="semester">Semester</label>
                            <input type="number" name="semester" class="form-control" id="semester"
                                placeholder="Masukkan Semester">
                        </div>
                        <div class="col-lg-6">
                            <label for="id_gol">Golongan</label>
                            <select name="id_gol" class="form-control" id="id_gol">
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_gol }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection