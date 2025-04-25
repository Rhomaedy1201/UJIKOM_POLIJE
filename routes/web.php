<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');

    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}/destroy', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('dosen/store', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('dosen/{id}/update', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('dosen/{id}/destroy', [DosenController::class, 'destroy'])->name('dosen.destroy');

    Route::get('matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
    Route::get('matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('matakuliah/store', [MataKuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::put('matakuliah/{id}/update', [MataKuliahController::class, 'update'])->name('matakuliah.update');
    Route::delete('matakuliah/{id}/destroy', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

    Route::get('golongan', [GolonganController::class, 'index'])->name('golongan');
    Route::get('golongan/create', [GolonganController::class, 'create'])->name('golongan.create');
    Route::post('golongan/store', [GolonganController::class, 'store'])->name('golongan.store');
    Route::get('golongan/{id}/edit', [GolonganController::class, 'edit'])->name('golongan.edit');
    Route::put('golongan/{id}/update', [GolonganController::class, 'update'])->name('golongan.update');
    Route::delete('golongan/{id}/destroy', [GolonganController::class, 'destroy'])->name('golongan.destroy');

    Route::get('ruang', [RuangController::class, 'index'])->name('ruang');
    Route::get('ruang/create', [RuangController::class, 'create'])->name('ruang.create');
    Route::post('ruang/store', [RuangController::class, 'store'])->name('ruang.store');
    Route::get('ruang/{id}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
    Route::put('ruang/{id}/update', [RuangController::class, 'update'])->name('ruang.update');
    Route::delete('ruang/{id}/destroy', [RuangController::class, 'destroy'])->name('ruang.destroy');
});

require __DIR__ . '/auth.php';
