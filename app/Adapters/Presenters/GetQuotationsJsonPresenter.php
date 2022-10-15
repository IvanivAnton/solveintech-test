<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResponseViewModel;
use App\Domain\DTO\Output\GetQuotationsOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use App\Domain\OutputInterfaces\GetQuotationsOutputInterface;
use Illuminate\Http\JsonResponse;

class GetQuotationsJsonPresenter implements GetQuotationsOutputInterface
{
    public function success(GetQuotationsOutputDTO $model): ViewModelInterface
    {
        return new JsonResponseViewModel(
            new JsonResponse($model->getData())
        );
    }

    public function noData(GetQuotationsOutputDTO $model): ViewModelInterface
    {
        return new JsonResponseViewModel(
            new JsonResponse(null, 404)
        );
    }
}
