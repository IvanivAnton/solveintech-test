<?php

namespace App\Http\Controllers\UserPage;

use App\Domain\UseCases\GenerateApiTokensUseCase;

class GenerateApiTokenController extends \App\Http\Controllers\Controller
{
    private GenerateApiTokensUseCase $useCase;

    /**
     * @param GenerateApiTokensUseCase $useCase
     */
    public function __construct(GenerateApiTokensUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->useCase->handle();
    }

}
