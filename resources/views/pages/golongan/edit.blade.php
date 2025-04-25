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

                <form action="{{ route('golongan.update', $golongan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="nama_gol">Nama Golongan</label>
                            <input type="text" name="nama_gol" class="form-control" id="nama_gol"
                                value="{{ old('nama_gol', $golongan->nama_gol) }}" placeholder="Masukkan Nama Golongan">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection