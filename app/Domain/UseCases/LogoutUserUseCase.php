<?php

namespace App\Domain\UseCases;

use App\Domain\Entities\ViewModelInterface;
use App\Domain\OutputInterfaces\LogoutUserOutputInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;

class LogoutUserUseCase
{
    private AuthServiceInterface $authService;
    private LogoutUserOutputInterface $output;

    /**
     * @param AuthServiceInterface $authService
     * @param LogoutUserOutputInterface $output
     */
    public function __construct(AuthServiceInterface $authService, LogoutUserOutputInterface $output)
    {
        $this->authService = $authService;
        $this->output = $output;
    }


    public function handle(): ViewModelInterface
    {
        $this->authService->logout();
        return $this->output->loggedOut();
    }
}
