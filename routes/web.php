<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MerkMobilController;
use App\Http\Controllers\TypeMobilController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('layouts/beranda');
});

Route::get('/home', function () {
    return view('home');
});

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->middleware('guest');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Select 2
Route::get('selectMerk',[MerkMobilController::class, 'merk'])->name('merk.index');
Route::get('selectType/{id}',[MerkMobilController::class, 'type']);

//beranda contact

// Menyimpan data pelanggan baru
Route::post('/simpan', [PelangganController::class, 'simpan'])->name('pelanggan.simpan');

// Menampilkan halaman index (daftar pelanggan)
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index')->middleware('auth');
// Menampilkan halaman form untuk menambahkan pelanggan baru
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create')->middleware('auth');
// Menyimpan data pelanggan baru
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store')->middleware('auth');
// Menampilkan halaman detail pelanggan berdasarkan ID
Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show')->middleware('auth');
// Menampilkan halaman form untuk mengedit data pelanggan berdasarkan ID
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit')->middleware('auth');
// Mengupdate data pelanggan berdasarkan ID
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update')->middleware('auth');
// Menampilkan halaman form untuk menghapus berdasarkan ID
Route::get('/student-delete/{id}',[StudentController::class, 'delete' ])->name('pelanggan.delete')->middleware('auth');
// Menghapus data pelanggan berdasarkan ID
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy')->middleware('auth');
// Menampilkan Halaman Soft Deleted
Route::get('/pelanggans-deleted',[PelangganController::class, 'deletedPelanggan' ])->middleware('auth');
// Merestore Data Pelanggan
Route::get('/pelanggan/{id}/restore', [PelangganController::class, 'restore'])->middleware('auth');

// Menampilkan halaman index (daftar merk)
Route::get('/merk-mobil', [MerkMobilController::class, 'index'])->middleware('auth')->middleware('auth');
// Menampilkan form tambah data merk mobil
Route::get('/merk-mobil/tambah', [MerkMobilController::class, 'tambahForm'])->name('merk-mobil.tambahForm')->middleware('auth');
// Menyimpan data merk mobil dari form
Route::post('/merk-mobil/tambah', [MerkMobilController::class, 'tambah'])->name('merk-mobil.tambah')->middleware('auth');
// Menghapus data merk mobil
Route::delete('/merk-mobil/{id}/hapus', [MerkMobilController::class, 'hapus'])->name('merk-mobil.hapus')->middleware('auth');

// Rute untuk menampilkan data type mobil
Route::get('/type-mobil', [TypeMobilController::class, 'index'])->name('type-mobil.index')->middleware('auth')->middleware('auth');
// Menampilkan form tambah data type mobil
Route::get('/type-mobil/tambah', [TypeMobilController::class, 'tambahForm'])->name('type-mobil.tambahForm')->middleware('auth');
// Menyimpan data type mobil dari form
Route::post('/type-mobil/tambah', [TypeMobilController::class, 'tambah'])->name('type-mobil.tambah')->middleware('auth');
// Menghapus data type mobil
Route::delete('/type-mobil/{id}/hapus', [TypeMobilController::class, 'hapus'])->name('type-mobil.hapus')->middleware('auth');
