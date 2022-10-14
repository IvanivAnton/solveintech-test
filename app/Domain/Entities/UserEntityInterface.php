<?php

namespace App\Domain\Entities;

use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\Contracts\HasApiTokens;

interface UserEntityInterface extends HasApiTokens, Authenticatable
{
    public function getEmail(): string;
    public function getPassword(): string;
}
