<?php

namespace App\Domain\OutputInterfaces;

use App\Domain\DTO\Output\GetUserInfoOutputDTO;
use App\Domain\Entities\ViewModelInterface;

interface GetUserInfoOutputInterface
{
    public function success(GetUserInfoOutputDTO $model): ViewModelInterface;
}
