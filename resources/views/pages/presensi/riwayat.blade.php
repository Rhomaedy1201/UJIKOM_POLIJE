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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presensis as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->kode_mk }}</td>

                                    <td
                                        class="btn btn-sm {{ $item->status_kehadiran == 'hadir' ? 'btn-success' : 'btn-danger' }}">
                                        {{ $item->status_kehadiran }}
                                    </td>

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
