<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login'); // mengarah ke resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended('/dashboard'); // nanti arahkan ke dashboard
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }
}
