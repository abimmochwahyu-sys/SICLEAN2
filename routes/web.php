<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('layanan', LayananController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('laporan', LaporanController::class);



Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

