<?php

namespace App\Domain\Output;

use App\Domain\OutputModels\GetQuotationsResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface GetQuotationsOutputInterface
{
    public function success(GetQuotationsResponseModel $model): Response;
    public function noData(GetQuotationsResponseModel $model): Response;
}
