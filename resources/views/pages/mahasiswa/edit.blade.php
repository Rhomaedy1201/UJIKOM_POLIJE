@extends('layouts.app')
@section('title', 'Mahasiswa')
@section('title2', 'Mahasiswa')
@section('titlePage', 'Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa</h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success mx-3">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger mx-3">{{ session('error') }}</div>
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

                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nim">NIM</label>
                                <input type="text" name="nim" class="form-control" id="nim"
                                    value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Masukkan NIM">
                            </div>
                            <div class="col-lg-6">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="col-lg-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="{{ old('alamat', $mahasiswa->alamat) }}" placeholder="Masukkan Alamat">
                            </div>
                            <div class="col-lg-6">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp"
                                    value="{{ old('no_hp', $mahasiswa->no_hp) }}" placeholder="Masukkan No HP">
                            </div>
                            <div class="col-lg-6">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester" class="form-control" id="semester"
                                    value="{{ old('semester', $mahasiswa->semester) }}" placeholder="Masukkan Semester">
                            </div>
                            <div class="col-lg-6">
                                <label for="id_gol">Golongan</label>
                                <select name="id_gol" class="form-control" id="id_gol">
                                    <option value="">-- Pilih Golongan --</option>
                                    @foreach ($golongan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_gol', $mahasiswa->id_gol) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_gol }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
