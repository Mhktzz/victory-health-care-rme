<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return match (Auth::user()->role) {
                'super_admin' => redirect()->route('dashboard.superadmin'),
                'manajer' => redirect()->route('dashboard.manajer'),
                'pendaftaran' => redirect()->route('dashboard.pendaftaran.reservasi.index'),
                'perawat' => redirect()->route('dashboard.perawat'),
                'dokter' => redirect()->route('dashboard.dokter'),
                'apoteker' => redirect()->route('dashboard.apoteker'),
                default => redirect('/login')
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
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
