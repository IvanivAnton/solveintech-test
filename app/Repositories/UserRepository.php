<?php

namespace App\Repositories;

use App\Domain\Entities\UserEntityInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function save(UserEntityInterface $user): UserEntityInterface
    {
        /** @var UserEntityInterface $user */
        $user = User::query()->create([
            'email' => $user->getEmail(),
            'password' => Hash::make($user->getPassword()),
        ]);

        return $user;
    }

    public function createApiToken(UserEntityInterface $user): string
    {
        return $user->createToken('API Token')->plainTextToken;
    }

    public function dropApiTokens(UserEntityInterface $user): bool
    {
        return $user->tokens()->delete() > 0;
    }
}
