<?php

namespace App\Domain\OutputInterfaces;

use App\Domain\DTO\Output\GetQuotationsOutputDTO;
use App\Domain\Entities\ViewModelInterface;

interface GetQuotationsOutputInterface
{
    public function success(GetQuotationsOutputDTO $model): ViewModelInterface;
    public function noData(GetQuotationsOutputDTO $model): ViewModelInterface;
}
