<?php

namespace App\Factories;

use App\Domain\Entities\UserEntityInterface;
use App\Domain\FactoryInterfaces\UserFactoryInterface;
use App\Models\User;

class UserFactory implements UserFactoryInterface
{
    public function make(array $params): UserEntityInterface
    {
        return new User($params);
    }
}
