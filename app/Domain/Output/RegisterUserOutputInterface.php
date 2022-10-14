<?php

namespace App\Domain\Output;

use App\Domain\OutputModels\RegisterUserOutputModel;
use Symfony\Component\HttpFoundation\Response;

interface RegisterUserOutputInterface
{
    public function registered(RegisterUserOutputModel $model): Response;
}
