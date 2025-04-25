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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Mata Kuliah</h6>
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

                    <form action="{{ route('matakuliah.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="kode_mk">kode_mk</label>
                                <input type="text" name="kode_mk" class="form-control" id="kode_mk"
                                    placeholder="Masukkan kode_mk">
                            </div>
                            <div class="col-lg-6">
                                <label for="nama_mk">nama_mk</label>
                                <input type="text" name="nama_mk" class="form-control" id="nama_mk"
                                    placeholder="Masukkan nama_mk">
                            </div>
                            <div class="col-lg-6">
                                <label for="sks">sks</label>
                                <input type="number" name="sks" class="form-control" id="sks"
                                    placeholder="Masukkan sks">
                            </div>

                            <div class="col-lg-6">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester" class="form-control" id="semester"
                                    placeholder="Masukkan Semester">
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
