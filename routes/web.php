<?php

use App\Http\Controllers\DashboardMhsController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalAkademikController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth:web', 'verified'])->group(function () {
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
    Route::get('/mahasiswa/{id}/destroy', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('dosen/store', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('dosen/{id}/update', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('dosen/{id}/destroy', [DosenController::class, 'destroy'])->name('dosen.destroy');

    Route::get('matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
    Route::get('matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('matakuliah/store', [MataKuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::put('matakuliah/{id}/update', [MataKuliahController::class, 'update'])->name('matakuliah.update');
    Route::get('matakuliah/{id}/destroy', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

    Route::get('golongan', [GolonganController::class, 'index'])->name('golongan');
    Route::get('golongan/create', [GolonganController::class, 'create'])->name('golongan.create');
    Route::post('golongan/store', [GolonganController::class, 'store'])->name('golongan.store');
    Route::get('golongan/{id}/edit', [GolonganController::class, 'edit'])->name('golongan.edit');
    Route::put('golongan/{id}/update', [GolonganController::class, 'update'])->name('golongan.update');
    Route::get('golongan/{id}/destroy', [GolonganController::class, 'destroy'])->name('golongan.destroy');

    Route::get('ruang', [RuangController::class, 'index'])->name('ruang');
    Route::get('ruang/create', [RuangController::class, 'create'])->name('ruang.create');
    Route::post('ruang/store', [RuangController::class, 'store'])->name('ruang.store');
    Route::get('ruang/{id}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
    Route::put('ruang/{id}/update', [RuangController::class, 'update'])->name('ruang.update');
    Route::get('ruang/{id}/destroy', [RuangController::class, 'destroy'])->name('ruang.destroy');

    Route::get('pengampu', [PengampuController::class, 'index'])->name('pengampu');
    Route::get('pengampu/create', [PengampuController::class, 'create'])->name('pengampu.create');
    Route::post('pengampu/store', [PengampuController::class, 'store'])->name('pengampu.store');
    Route::get('pengampu/{id}/edit', [PengampuController::class, 'edit'])->name('pengampu.edit');
    Route::put('pengampu/{id}/update', [PengampuController::class, 'update'])->name('pengampu.update');
    Route::get('pengampu/{id}/destroy', [PengampuController::class, 'destroy'])->name('pengampu.destroy');

    Route::get('jadwal_akademik', [JadwalAkademikController::class, 'index'])->name('jadwal_akademik');
    Route::get('jadwal_akademik/create', [JadwalAkademikController::class, 'create'])->name('jadwal_akademik.create');
    Route::post('jadwal_akademik/store', [JadwalAkademikController::class, 'store'])->name('jadwal_akademik.store');
    Route::get('jadwal_akademik/{id}/edit', [JadwalAkademikController::class, 'edit'])->name('jadwal_akademik.edit');
    Route::put('jadwal_akademik/{id}/update', [JadwalAkademikController::class, 'update'])->name('jadwal_akademik.update');
    Route::get('jadwal_akademik/{id}/destroy', [JadwalAkademikController::class, 'destroy'])->name('jadwal_akademik.destroy');

    Route::get('krs', [KrsController::class, 'index'])->name('krs');
    Route::get('krs/create', [KrsController::class, 'create'])->name('krs.create');
    Route::post('krs/store', [KrsController::class, 'store'])->name('krs.store');
    Route::get('krs/{id}/edit', [KrsController::class, 'edit'])->name('krs.edit');
    Route::put('krs/{id}/update', [KrsController::class, 'update'])->name('krs.update');
    Route::get('krs/{id}/destroy', [KrsController::class, 'destroy'])->name('krs.destroy');

});

Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/dashboard_mhs', [DashboardMhsController::class, 'index'])->name('dashboard_mhs');
    Route::get('presensi', [PresensiController::class, 'index'])->name('presensi');
});

require __DIR__ . '/auth.php';
