<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     *  Menentukan apakah request ini diizinkan
     */
    public function authorize(): bool
    {
        return true;
    }

    /** 
     * Aturan validasi untuk form login
     * 
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string'], // bisa email atau npk
            'password' => ['required', 'string'],
        ];
    }


    /**
     * Mencoba untuk mengautentikasi pengguna berdasarakan login dan password
     * 
     * @throws \Illuminate\Validation\ValidationException
     */

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();
        
        $login = $this->input('login');
        $password = $this->input('password');
        $remember = $this->boolean('remember');

        // cek apakah login berupa email atau npk
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'npk';

        $user = \App\Models\User::where($field, $login)->first();

        if (!$user || !\Hash::check($password, $user->password)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login' => __('auth.failed'),
            ]);
        }

        if (!$user->is_active){
            throw ValidationException::withMessages([
                'login' => 'Akun Anda telah dinonaktifkan',
            ]);
        }

        Auth::login($user, $remember);

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Memastikan Request tidak melebihi batas limit
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Menghasilkan throttle key unik berdasarkan login dan IP
     * 
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('login')).'|'.$this->ip()
        );
    }
}