<?php

namespace App\Http\Controllers\UserPage;

use App\Domain\InputParams\RegisterUserInputParams;
use App\Domain\UseCases\RegisterUserUseCase;
use App\Http\Requests\RegisterUserRequest;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserController extends \App\Http\Controllers\Controller
{
    private RegisterUserUseCase $useCase;

    /**
     * @param RegisterUserUseCase $useCase
     */
    public function __construct(RegisterUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }


    public function __invoke(RegisterUserRequest $request): Response
    {
        $validated = $request->validated();
        return $this->useCase->handle(new RegisterUserInputParams(
           email: $validated['email'],
           password: $validated['password'],
        ));
    }
}
