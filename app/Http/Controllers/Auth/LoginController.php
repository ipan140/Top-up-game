<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan ada view resources/views/auth/login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Bandingkan password plain text dengan hash di DB
            if (Hash::check($request->password, $user->password)) {
                // Login pakai Auth Laravel
                Auth::login($user, $request->filled('remember'));

                $request->session()->regenerate();

                if ($user->role === 'admin') {
                    return redirect()->route('dashboard')->with('success', 'Selamat datang Admin!');
                }

                return redirect()->route('landing')->with('success', 'Login berhasil!');
            } else {
                return back()->withErrors([
                    'password' => 'Password salah!',
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan!',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
