<?php

namespace App\Services;

use App\Domain\Entities\UserEntityInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
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
        $result = Auth::attempt(['email' => $user->getEmail(), 'password' => $user->getPassword()]);
        if($result) {
            session()->regenerate();
        }

        return $result;
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
