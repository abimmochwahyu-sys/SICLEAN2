<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


Route::resource('pelanggan', PelangganController::class);
Route::resource('layanan', LayananController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('laporan', LaporanController::class);


// Form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard (setelah login berhasil)
Route::get('/dashboard', function () {
    return view('dashboard'); // Ganti dengan file dashboard kamu
})->name('dashboard')->middleware('auth');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
