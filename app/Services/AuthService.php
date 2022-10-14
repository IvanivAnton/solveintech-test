<?php

namespace App\Services;

use App\Domain\Entities\UserEntityInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function isLogged(): bool
    {
        return Auth::check();
    }

    public function login(UserEntityInterface $user): void
    {
        Auth::login($user);
        session()->regenerate();
    }

    public function attempt(UserEntityInterface $user): bool
    {
        return Auth::attempt(['email' => $user->getEmail(), 'password' => $user->getPassword()]);
    }

    public function user(): UserEntityInterface
    {
        /** @var User $user */
        $user = Auth::user();
        return $user;
    }

    public function logout(): void
    {
        Auth::logout();
        $session = session();
        $session->invalidate();
        $session->regenerateToken();
    }
}
