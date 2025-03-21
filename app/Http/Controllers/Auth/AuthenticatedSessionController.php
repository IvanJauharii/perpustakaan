<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah email dan password cocok dengan pengguna di tabel users
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan ke dashboard sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'petugas') {
                return redirect()->route('petugas.dashboard');
            } elseif ($user->role === 'peminjam') {
                return redirect()->route('index');
            }

            return redirect('/'); // Default jika tidak ada role
        }
        return back()->withErrors(['email' => 'Email atau password salah.']);

        // $request->authenticate();
        // $request->session()->regenerate();

        // Cek role pengguna
        // $user = Auth::user();

        // if ($user->role === 'admin') {
        //     return redirect()->intended(route('admin.dashboard'));
        // } elseif ($user->role === 'peminjam') {
        //     return redirect()->intended(route('peminjam.dashboard'));
        // } elseif ($user->role === 'petugas') {
        //     return redirect()->intended(route('petugas.dashboard'));
        // } else {
        //     return redirect()->intended(route('login'));
        // }
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
