@extends('layouts.app')
@section('title', 'Presensi')
@section('title2', 'Presensi')
@section('titlePage', 'Home')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Nama Matkul</th>
                                <th>Golongan</th>
                                <th>Presensi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->matakuliah->nama_mk }}</td>
                                    <td>{{ $item->golongan->nama_gol }}</td>
                                    <form action="{{ route('presensi.store') }}" method="POST">
                                        @csrf

                                        <td>
                                            <select name="status_kehadiran" class="form-control form-select form-select-sm"
                                                required>
                                                <option value="hadir">Hadir</option>
                                                <option value="alpa">Alpa</option>
                                                <option value="izin">Izin</option>
                                            </select>

                                            <input type="hidden" name="hari" value="{{ $item->hari }}">
                                            <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                                            <input type="hidden" name="nim" value="{{ Auth::user()->nim }}">
                                            <input type="hidden" name="kode_mk" value="{{ $item->kode_mk }}">

                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-success mt-1">Presensi</button>
                                        </td>
                                    </form>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
@endsection
