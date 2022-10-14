<?php

namespace App\Adapters\Presenters;

use App\Domain\OutputModels\GetQuotationsResponseModel;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetQuotationsJsonPresenter implements \App\Domain\Output\GetQuotationsOutputInterface
{
    public function success(GetQuotationsResponseModel $model): Response
    {
        return new JsonResponse($model->getData());
    }

    public function noData(GetQuotationsResponseModel $model): Response
    {
        return new JsonResponse(null, 404);
    }
}
