@extends('layouts.app')
@section('title', 'matkul')
@section('title2', 'matkul')
@section('titlePage', 'Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit matkul</h6>
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

                    <form action="{{ route('matakuliah.update', $matkul->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="kode_mk">kode_mk</label>
                                <input type="text" name="kode_mk" class="form-control" id="kode_mk"
                                    value="{{ old('kode_mk', $matkul->kode_mk) }}" placeholder="Masukkan kode_mk">
                            </div>
                            <div class="col-lg-6">
                                <label for="nama_mk">nama_mk</label>
                                <input type="text" name="nama_mk" class="form-control" id="nama_mk"
                                    value="{{ old('nama_mk', $matkul->nama_mk) }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="col-lg-6">
                                <label for="sks">sks</label>
                                <input type="number" name="sks" class="form-control" id="sks"
                                    value="{{ old('sks', $matkul->sks) }}" placeholder="Masukkan Sks">
                            </div>

                            <div class="col-lg-6">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester" class="form-control" id="semester"
                                    value="{{ old('semester', $matkul->semester) }}" placeholder="Masukkan Semester">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
