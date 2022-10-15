<?php

namespace App\Http\Controllers\UserPage;

use App\Domain\UseCases\GetUserInfoUseCase;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    private GetUserInfoUseCase $useCase;

    /**
     * @param GetUserInfoUseCase $useCase
     */
    public function __construct(GetUserInfoUseCase $useCase)
    {
        $this->useCase = $useCase;
    }


    public function __invoke(): Response
    {
        return $this->useCase->handle()->getResponse();
    }
}
