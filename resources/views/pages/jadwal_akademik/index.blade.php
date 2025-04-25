@extends('layouts.app')
@section('title', 'Jadwal Akademik')
@section('title2', 'Jadwal Akademik')
@section('titlePage', 'Home')

@section('content')
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <a href="{{ route('jadwal_akademik.create') }}" class="btn btn-primary mb-1">Tambah</a>
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
                            <th>Hari</th>
                            <th>Nama Matkul</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Nama Ruangan</th>
                            <th>Golongan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->matakuliah->nama_mk }}</td>
                            <td>{{ $item->matakuliah->sks }}</td>
                            <td>{{ $item->matakuliah->semester }}</td>
                            <td>{{ $item->ruang->nama_ruang }}</td>
                            <td>{{ $item->golongan->nama_gol }}</td>
                            <td>
                                <a href="{{ route('jadwal_akademik.edit', $item->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <a href="{{ route('jadwal_akademik.destroy', $item->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data mahasiswa.</td>
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