<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'npk' => ['required', 'string', 'max:20', 'unique:users'],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'nohp' => ['required', 'digit_between:10-15', 'max:15'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'in:user,admin'],
    ], [
        'nohp.digits_between' => 'Nomor HP harus berupa angka 10 hingga 15 digit.',
        'email.unique' => 'Email ini sudah digunakan oleh user lain.',
        'npk.unique' => 'NPK sudah terdaftar.',
        ]);

    $user = User::create([
        'npk' => $request->npk,
        'name' => $request->name,
        'email' => $request->email,
        'nohp' => $request->nohp,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    // Jangan login sebagai user baru
    // Auth::login($user); ← ini dihapus

    return redirect()->back()->with('success', 'User berhasil didaftarkan.');
}

}
