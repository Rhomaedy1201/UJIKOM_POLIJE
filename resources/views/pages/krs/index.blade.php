@extends('layouts.app')
@section('title', 'Dashboard')
@section('title2', 'Dashboard')
@section('titlePage', 'Home')

@section('content')
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <a href="{{ route('krs.create') }}" class="btn btn-primary mb-1">Tambah</a>
            </div>
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
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($krs as $kkrs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kkrs->nim }}</td>
                            <td>{{ $kkrs->mahasiswa->nama }}</td>
                            <td>{{ $kkrs->mahasiswa->semester }}</td>
                            <td>{{ $kkrs->matakuliah->nama_mk }}</td>
                            <td>{{ $kkrs->matakuliah->sks }} SKS</td>
                            <td>
                                <a href="{{ route('krs.edit', $kkrs->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('krs.destroy', $kkrs->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data krs.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('extraScript')
<script>
    $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
</script>
@endpush