@extends('layouts.app')
@section('title', 'Jadwal Akademik')
@section('title2', 'Jadwal Akademik')
@section('titlePage', 'Edit')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Jadwal Akademik</h6>
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

                <form action="{{ route('jadwal_akademik.update', $jadwalAkademik->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label>Hari</label>
                            <select name="hari" class="form-control" required>
                                <option value="">-- Pilih Hari --</option>
                                <option value="senin" {{ $jadwalAkademik->hari=='senin' ? 'selected' : '' }}>senin
                                </option>
                                <option value="selesa" {{ $jadwalAkademik->hari=='selesa' ? 'selected' : '' }}>selesa
                                </option>
                                <option value="rabu" {{ $jadwalAkademik->hari=='rabu' ? 'selected' : '' }}>rabu</option>
                                <option value="kamis" {{ $jadwalAkademik->hari=='kamis' ? 'selected' : '' }}>kamis
                                </option>
                                <option value="jumat" {{ $jadwalAkademik->hari=='jumat' ? 'selected' : '' }}>jumat
                                </option>
                                <option value="sabtu" {{ $jadwalAkademik->hari=='sabtu' ? 'selected' : '' }}>sabtu
                                </option>
                                <option value="minggu" {{ $jadwalAkademik->hari=='minggu' ? 'selected' : '' }}>minggu
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Mata Kuliah</label>
                            <select name="kode_mk" class="form-control" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($matkul as $item)
                                <option value="{{ $item->kode_mk }}" {{ $jadwalAkademik->kode_mk==$item->kode_mk ?
                                    'selected' :
                                    ''}}>{{
                                    $item->nama_mk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Ruang</label>
                            <select name="id_ruang" class="form-control" required>
                                <option value="">-- Pilih Ruang --</option>
                                @foreach ($ruang as $item)
                                <option value="{{ $item->id }}" {{ $jadwalAkademik->id_ruang==$item->id ? 'selected' :
                                    '' }}>{{
                                    $item->nama_ruang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="id_gol">Golongan</label>
                            <select name="id_gol" class="form-control" id="id_gol" required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $item)
                                <option value="{{ $item->id }}" {{ $jadwalAkademik->id_gol==$item->id ? 'selected' : ''
                                    }}>{{
                                    $item->nama_gol }}</option>
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