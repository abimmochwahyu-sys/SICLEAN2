<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // File Blade nanti kita buat di resources/views/auth/login.blade.php
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // karena file ada di resources/views/auth/register.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'username' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(Route ('adminDashboard'))->with('success', 'Selamat Anda Berhasil Login');
            } else if (Auth::user()->role === 'user') {
                return redirect()->intended(Route('userDashboard'))->with('success', 'Selamat Anda Berhasil Login');
            } else{
                return redirect()->intended('/login')->with('error', 'Username atau Password atau username anda salah');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
