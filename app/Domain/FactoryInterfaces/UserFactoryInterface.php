<?php

namespace App\Domain\FactoryInterfaces;

use App\Domain\Entities\UserEntityInterface;

interface UserFactoryInterface
{
    public function make(array $params): UserEntityInterface;
}
