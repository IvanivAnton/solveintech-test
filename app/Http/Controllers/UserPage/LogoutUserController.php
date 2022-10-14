<?php

namespace App\Http\Controllers\UserPage;

use App\Domain\UseCases\LogoutUserUseCase;
use Symfony\Component\HttpFoundation\Response;

class LogoutUserController extends \App\Http\Controllers\Controller
{
    private LogoutUserUseCase $useCase;

    /**
     * @param LogoutUserUseCase $useCase
     */
    public function __construct(LogoutUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }


    public function __invoke(): Response
    {
       return $this->useCase->handle();
    }

}
