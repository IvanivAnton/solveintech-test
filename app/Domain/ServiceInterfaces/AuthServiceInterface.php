<?php

namespace App\Domain\ServiceInterfaces;

use App\Domain\Entities\UserEntityInterface;

interface AuthServiceInterface
{
    public function isLogged(): bool;

    public function login(UserEntityInterface $user): void;

    public function attempt(UserEntityInterface $user): bool;

    public function user(): UserEntityInterface;

    public function logout(): void;
}
