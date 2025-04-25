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
                        <tr>
                            <td><a href="#">RA0449</a></td>
                            <td>Udin Wayang</td>
                            <td>Nasi Padang</td>
                            <td><span class="badge badge-success">Delivered</span></td>
                            <td><a href="#" class="btn btn-sm btn-success">Presensi</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection