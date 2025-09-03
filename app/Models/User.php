<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $fillable = [
    'name',
    'username',
    'email',
    'password',
];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Simpan ke database users
    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Auto login setelah register
    Auth::login($user);

    return redirect()->route('login')->with('success', 'Registrasi berhasil!');
}

}

