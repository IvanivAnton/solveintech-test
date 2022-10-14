<?php

namespace App\Domain\UseCases;

use App\Domain\Output\GetUserInfoOutputInterface;
use App\Domain\OutputModels\GetUserInfoOutputModel;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\Response;

class GetUserInfoUseCase
{
    private AuthService $authService;
    private GetUserInfoOutputInterface $output;

    /**
     * @param AuthService $authService
     * @param GetUserInfoOutputInterface $output
     */
    public function __construct(AuthService $authService, GetUserInfoOutputInterface $output)
    {
        $this->authService = $authService;
        $this->output = $output;
    }


    public function handle(): Response
    {
        $userIsLogged = $this->authService->isLogged();

        $loginUrl = route('login');
        $logoutUrl = route('logout');
        $registerUrl = route('register');
        $regenerateTokenUrl = route('regenerateToken');

        return $this->output->success(new GetUserInfoOutputModel(
            isUserLogged: $userIsLogged,
            loginUrl: $loginUrl,
            logoutUrl: $logoutUrl,
            registerUrl: $registerUrl,
            regenerateTokenUrl: $regenerateTokenUrl,
        ));
    }
}
