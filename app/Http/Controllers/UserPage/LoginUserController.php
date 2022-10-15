<?php

namespace App\Http\Controllers\UserPage;

use App\Domain\DTO\Input\LoginUserInputDTO;
use App\Domain\UseCases\LoginUserUseCase;
use App\Http\Requests\LoginUserRequest;
use Symfony\Component\HttpFoundation\Response;

class LoginUserController
{
    private LoginUserUseCase $useCase;

    /**
     * @param LoginUserUseCase $useCase
     */
    public function __construct(LoginUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }


    public function __invoke(LoginUserRequest $request): Response
    {
        $validated = $request->validated();
        return $this->useCase->handle(new LoginUserInputDTO(
            email: $validated['email'],
            password: $validated['password'],
        ))->getResponse();
    }

}
