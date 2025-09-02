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

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
// Dashboard (setelah login berhasil)
Route::get('/dashboard', function () {
    return view('dashboard'); // Ganti dengan file dashboard kamu
})->name('dashboard')->middleware('auth');

    // user
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

        Route::get('/user/layanan', function () {
        return view('user.layanan');
    })->name('user.layanan');


Route::middleware(['auth'])->group(function () {
    Route::resource('admin/users', \App\Http\Controllers\Admin\UserController::class)
        ->only(['index','create','store']);
});
