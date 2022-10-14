<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\InputParams\GetQuotationsInputParams;
use App\Domain\UseCases\GetQuotationsUseCase;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class GetQuotationsController extends Controller
{
    private GetQuotationsUseCase $useCase;

    /**
     * @param GetQuotationsUseCase $useCase
     */
    public function __construct(GetQuotationsUseCase $useCase)
    {
        $this->useCase = $useCase;
    }


    public function __invoke(string $date): Response
    {
        return $this->useCase->handle(new GetQuotationsInputParams(date: $date));
    }
}
