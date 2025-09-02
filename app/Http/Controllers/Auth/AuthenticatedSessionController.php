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
     * Menampilkan halaman login
     */
    public function create(): View
    {
        return view('auth.login');
    }


    /**
     * Menangani Proses Autentikasi
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate(); //regenerasi session

        $user = Auth::user(); //Ambil user yang sudah login

        if (!$user){
            return redirect()->route('login')->withErrors(['npk' => 'User tidak dikenali']);
        }
        $role = $user->getRoleNames()->first();// Mengakses nama role melalui relasi

        // Redirect berdasarkan role user
        switch ($role) {
            case 'supervisor':
                return redirect()->route('supervisor.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'user':
                return redirect()->route('users.dashboard');
            case 'section_head':
                return redirect()->route('sectionhead.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors('Role tidak dikenali.');
        }
    }

    /**
     * Menghancurkan sesi autentikasi user(logout)
     */

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
