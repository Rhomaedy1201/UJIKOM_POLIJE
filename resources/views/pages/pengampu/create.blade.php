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

                    <form action="{{ route('pengampu.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nip">Nama Dosen</label>
                                <select name="nip" class="form-control" id="nip">
                                    <option value="">-- Pilih Dosen --</option>
                                    @foreach ($data_dosen as $item)
                                        <option value="{{ $item->nip }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="kode_mk">Pilih Mata Kuliah</label>
                                <select name="kode_mk" class="form-control" id="kode_mk">
                                    <option value="">-- Pilih Mata Kuliah --</option>
                                    @foreach ($data_matakuliah as $item)
                                        <option value="{{ $item->kode_mk }}">{{ $item->nama_mk }}</option>
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
