@extends('layouts.app')
@section('title', "User")
@section('title2', "User")
@section('titlePage', "Tambah")

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
            </div>
            <div class="card-body">
                <form action="" method="">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control" id="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="col-lg-6">
                            <label for="Email">Email</label>
                            <input type="text" name="email" class="form-control" id="Email"
                                placeholder="Masukkan Email">
                        </div>
                        <div class="col-lg-6">
                            <label for="Email">Email</label>
                            <input type="text" name="email" class="form-control" id="Email"
                                placeholder="Masukkan Email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection