<?php

namespace App\Domain\Output;

use App\Domain\OutputModels\GenerateApiTokenOutputModel;
use Symfony\Component\HttpFoundation\Response;

interface GenerateApiTokenOutputInterface
{
    public function generated(GenerateApiTokenOutputModel $model): Response;
}
