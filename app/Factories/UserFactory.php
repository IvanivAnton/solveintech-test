<?php

namespace App\Factories;

use App\Domain\Entities\UserEntityInterface;
use App\Models\User;

class UserFactory
{
    public function make(array $params): UserEntityInterface
    {
        return new User($params);
    }
}
