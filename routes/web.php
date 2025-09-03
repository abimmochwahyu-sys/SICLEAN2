<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\UserLayananController;
use App\Http\Controllers\User\UserTransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::get('/', function () {
    return view('auth.login');
});

// Form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::middleware(['auth','role:admin'])->group(function () {
    
    // Dashboard admin
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('adminDashboard');

    // Resource
    Route::resource('admin/pelanggan', PelangganController::class);
    Route::resource('admin/layanan', LayananController::class);
    Route::resource('admin/transaksi', TransaksiController::class);
    Route::resource('admin/laporan', LaporanController::class);

});

Route::middleware(['auth','role:user'])->group(function () {
    
    // Dashboard admin
    Route::get('user/dashboard', function () {
        return view('user.dashboard');
    })->name('userDashboard');

    
    Route::resource('layanan', UserLayananController::class);
    Route::resource('transaksi', UserTransaksiController::class);
});
