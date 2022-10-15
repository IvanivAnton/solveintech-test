<?php

namespace App\Domain\OutputInterfaces;

use App\Domain\Entities\ViewModelInterface;

interface LoginUserOutputInterface
{
    public function authenticated(): ViewModelInterface;
    public function authFailed(): ViewModelInterface;
}
