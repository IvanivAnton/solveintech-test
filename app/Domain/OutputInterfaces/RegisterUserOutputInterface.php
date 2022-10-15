<?php

namespace App\Domain\OutputInterfaces;

use App\Domain\DTO\Output\RegisterUserOutputDTO;
use App\Domain\Entities\ViewModelInterface;

interface RegisterUserOutputInterface
{
    public function registered(RegisterUserOutputDTO $model): ViewModelInterface;
}
