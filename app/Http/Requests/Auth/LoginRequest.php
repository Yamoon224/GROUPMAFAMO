<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();
        $keyauth = 'email';

        if (!filter_var($this->get('email'), FILTER_VALIDATE_EMAIL)) {
            $this->merge(['phone' => $this->get('email')]);
            $keyauth = 'phone';
        }

        $this->upgradeLegacyPassword($keyauth);

        if (! Auth::attempt($this->only($keyauth, 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Les comptes importés peuvent avoir un mot de passe qui n'est pas un hash bcrypt
     * (texte brut, md5, sha1…). Si le mot de passe saisi correspond, on le convertit en bcrypt.
     */
    protected function upgradeLegacyPassword(string $keyauth): void
    {
        $table = (new (config('auth.providers.users.model')))->getTable();
        $row = DB::table($table)->where($keyauth, $this->get($keyauth))->first();

        if (! $row || ! is_string($row->password ?? null) || str_starts_with($row->password, '$2y$')) {
            return;
        }

        $stored = $row->password;
        $given = (string) $this->get('password');

        $matches = hash_equals($stored, $given)
            || hash_equals(strtolower($stored), md5($given))
            || hash_equals(strtolower($stored), sha1($given))
            || (str_starts_with($stored, '$argon') && password_verify($given, $stored));

        if ($matches) {
            DB::table($table)->where('id', $row->id)->update(['password' => Hash::make($given)]);
        }
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
