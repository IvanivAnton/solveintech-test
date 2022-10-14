<?php

namespace App\Domain\Output;

use App\Domain\OutputModels\GetUserInfoOutputModel;
use Symfony\Component\HttpFoundation\Response;

interface GetUserInfoOutputInterface
{
    public function success(GetUserInfoOutputModel $model): Response;
}
