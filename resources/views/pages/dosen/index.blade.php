@extends('layouts.app')
@section('title', 'Data Dosen')
@section('title2', 'Data Dosen')
@section('titlePage', 'Home')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Table Data Dosen</h6>
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-1">Tambah</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success mx-3">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger mx-3">{{ session('error') }}</div>
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse($dosen as $dsn)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dsn->nip }}</td>
                                    <td>{{ $dsn->nama }}</td>
                                    <td>{{ $dsn->alamat }}</td>
                                    <td>{{ $dsn->no_hp }}</td>
                                    <td>
                                        <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('dosen.destroy', $dsn->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data dosen.</td>
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
