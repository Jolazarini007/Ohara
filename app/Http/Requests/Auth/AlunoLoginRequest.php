<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AlunoLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rm' => ['required', 'numeric'],
            'codigo_etec' => ['required', 'numeric'],
            'password' => ['required', 'string'],
        ];

    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('rm', 'codigo_etec', 'password');
        $remember = $this->boolean('remember');

        $aluno = \App\Models\Aluno::where('rm', $credentials['rm'])
            ->where('codigo_etec', $credentials['codigo_etec'])
            ->first();

        if (!$aluno || !password_verify($credentials['password'], $aluno->password)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'rm' => trans('auth.failed'),
            ]);
        }

        Auth::guard('aluno')->login($aluno, $remember);

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'rm' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
{
    return Str::transliterate(
        Str::lower($this->string('rm') . '|' . $this->string('codigo_etec')) . '|' . $this->ip()
    );
}
}
