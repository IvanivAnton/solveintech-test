<?php

namespace App\Domain\OutputInterfaces;

use App\Domain\DTO\Output\GenerateApiTokenOutputDTO;
use App\Domain\Entities\ViewModelInterface;

interface GenerateApiTokenOutputInterface
{
    public function generated(GenerateApiTokenOutputDTO $model): ViewModelInterface;
}
