<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Jangan lupa import Auth
use App\Http\Controllers\HomeController; // Import HomeController yang sudah ada
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PenggunaController;
//use App\Http\Controllers\LaporanController; // Untuk PDF

// Import Controllers untuk Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\MataPelajaranController as AdminMataPelajaranController;
use App\Http\Controllers\Admin\OrangTuaController as AdminOrangTuaController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\JadwalPelajaranController as AdminJadwalPelajaranController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;


// Import Controllers untuk Guru
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\PresensiController as GuruPresensiController;

// Import Controllers untuk Karyawan TU
use App\Http\Controllers\TU\DashboardController as TuDashboardController;
use App\Http\Controllers\TU\PresensiController as TuPresensiController;
use App\Http\Controllers\TU\LaporanController as TuLaporanController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute halaman selamat datang
Route::get('/', function () {
    return view('welcome');
});

// Rute autentikasi (login, register, logout) dari Laravel UI
Auth::routes();

// Rute untuk HomeController. Perhatikan bahwa HomeController sekarang mengarahkan ke admin.app.index
Route::get('/home', [HomeController::class, 'index'])->name('home');


//Rute untuk membuka fitur menu dashboard
Route::get('/absensi', [AbsensiController::class, 'index'])->name('admin.absensi.index');
Route::resource('absensi', AbsensiController::class);
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
// Rute untuk Cetak Laporan (akan kita bahas di bagian PDF)
Route::get('/laporan/cetak', function() {
    return view('laporan.cetak'); // Pastikan Anda memiliki view ini
})->name('laporan.cetak');
// Route::get('/laporan/cetak', [LaporanController::class, 'index'])->name('laporan.cetak'); // Jika pakai controller





// Rute untuk Admin (membutuhkan autentikasi dan peran 'admin')
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class); // Manajemen User (Admin bisa mengelola user lain)
    Route::resource('kelas', AdminKelasController::class); // Manajemen Data Kelas
    Route::resource('mapel', AdminMataPelajaranController::class); // Manajemen Data Mata Pelajaran
    Route::resource('orangtua', AdminOrangTuaController::class); // Manajemen Data Orang Tua
    Route::resource('siswa', AdminSiswaController::class); // Manajemen Data Siswa
    Route::resource('jadwal', AdminJadwalPelajaranController::class); // Manajemen Data Jadwal Pelajaran
    Route::get('/absensi', [AdminAbsensiController::class, 'index'])->name('absensi.index'); // Admin bisa melihat semua presensi
    Route::get('/absensi/create', [AdminAbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi', [AdminAbsensiController::class, 'store'])->name('absensi.store'); // Proses simpan data absensi
    Route::get('/absensi/{id}/edit', [AdminAbsensiController::class
, 'edit'])->name('absensi.edit'); // Form edit data absensi
    Route::put('/absensi/{id}', [AdminAbsensiController::class, 'update'])->name('absensi.update'); // Proses update data absensi
    Route::delete('/absensi/{id}', [AdminAbsensiController::class, 'destroy'])->name('absensi.destroy'); // Proses hapus data absensi
    Route::get('/laporan/absensi/pdf', [AdminAbsensiController::class, 'cetakPdf'])->name('laporan.absensi.pdf'); // Rute untuk cetak laporan absensi ke PDF
    // Tambahkan rute manajemen lainnya untuk admin jika diperlukan
});

// Rute untuk Guru (membutuhkan autentikasi dan peran 'guru')
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    Route::get('/presensi/{jadwal_id}', [GuruPresensiController::class, 'create'])->name('presensi.create'); // Form pencatatan presensi
    Route::post('/presensi', [GuruPresensiController::class, 'store'])->name('presensi.store'); // Proses simpan presensi
    Route::get('/jadwal-saya', [GuruDashboardController::class, 'jadwalSaya'])->name('jadwal_saya'); // Melihat jadwal mengajar guru
    Route::get('/riwayat-presensi', [GuruDashboardController::class, 'riwayatPresensi'])->name('riwayat_presensi'); // Melihat riwayat presensi yang dicatat oleh guru
    // Tambahkan rute khusus guru lainnya
});

// Rute untuk Karyawan TU (membutuhkan autentikasi dan peran 'karyawan_tu')
Route::middleware(['auth', 'role:karyawan_tu'])->prefix('tu')->name('tu.')->group(function () {
    Route::get('/dashboard', [TuDashboardController::class, 'index'])->name('dashboard');
    Route::get('/presensi', [TuPresensiController::class, 'index'])->name('presensi.index'); // Melihat dan mengelola presensi
    Route::get('/presensi/rekap', [TuLaporanController::class, 'rekapPresensi'])->name('presensi.rekap'); // Laporan rekap presensi
    Route::get('/presensi/detail/{siswa_id}', [TuLaporanController::class, 'detailPresensiSiswa'])->name('presensi.detail_siswa'); // Detail presensi per siswa
    // Tambahkan rute khusus karyawan TU lainnya
});