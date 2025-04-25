<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|string', // Bisa NIM atau Email
            'password' => 'required|string',
        ]);

        $login = $request->login;
        $password = $request->password;

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $login, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
        } else {
            // Login menggunakan NIM (Mahasiswa)
            $mahasiswa = Mahasiswa::where('nim', $login)->first();
            if ($mahasiswa && Hash::check($password, $mahasiswa->password)) {
                Auth::guard('mahasiswa')->login($mahasiswa);
                $request->session()->regenerate();
                return redirect()->route('dashboard_mhs');

            }
        }

        return redirect()->route('login')->with('error', 'Email/NIM atau Password salah!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}