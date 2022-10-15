<?php

namespace App\Domain\UseCases;

use App\Domain\DTO\Output\GetUserInfoOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use App\Domain\OutputInterfaces\GetUserInfoOutputInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;

class GetUserInfoUseCase
{
    private AuthServiceInterface $authService;
    private GetUserInfoOutputInterface $output;

    /**
     * @param AuthServiceInterface $authService
     * @param GetUserInfoOutputInterface $output
     */
    public function __construct(AuthServiceInterface $authService, GetUserInfoOutputInterface $output)
    {
        $this->authService = $authService;
        $this->output = $output;
    }


    public function handle(): ViewModelInterface
    {
        $userIsLogged = $this->authService->isLogged();

        $loginUrl = route('login');
        $logoutUrl = route('logout');
        $registerUrl = route('register');
        $regenerateTokenUrl = route('regenerateToken');

        return $this->output->success(new GetUserInfoOutputDTO(
            isUserLogged: $userIsLogged,
            loginUrl: $loginUrl,
            logoutUrl: $logoutUrl,
            registerUrl: $registerUrl,
            regenerateTokenUrl: $regenerateTokenUrl,
        ));
    }
}
