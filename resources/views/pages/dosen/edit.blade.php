@extends('layouts.app')
@section('title', 'dosen')
@section('title2', 'dosen')
@section('titlePage', 'Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit dosen</h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
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

                    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control" id="nip"
                                    value="{{ old('nip', $dosen->nip) }}" placeholder="Masukkan NIP">
                            </div>
                            <div class="col-lg-6">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ old('nama', $dosen->nama) }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="col-lg-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="{{ old('alamat', $dosen->alamat) }}" placeholder="Masukkan Alamat">
                            </div>
                            <div class="col-lg-6">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp"
                                    value="{{ old('no_hp', $dosen->no_hp) }}" placeholder="Masukkan No HP">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
