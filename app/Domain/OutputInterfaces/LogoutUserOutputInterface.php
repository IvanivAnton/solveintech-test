<?php

namespace App\Domain\OutputInterfaces;

use App\Domain\Entities\ViewModelInterface;

interface LogoutUserOutputInterface
{
    public function loggedOut(): ViewModelInterface;
}
