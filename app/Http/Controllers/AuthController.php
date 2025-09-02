<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // File Blade nanti kita buat di resources/views/auth/login.blade.php
    }

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Selamat datang Admin!');
        } else {
            return redirect()->route('user.dashboard')->with('success', 'Selamat datang User!');
        }
    }

    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
}



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
