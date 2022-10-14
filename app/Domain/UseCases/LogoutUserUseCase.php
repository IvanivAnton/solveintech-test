<?php

namespace App\Domain\UseCases;

use App\Domain\Output\LogoutUserOutputInterface;
use App\Services\AuthService;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LogoutUserUseCase
{
    private AuthService $authService;
    private LogoutUserOutputInterface $output;

    /**
     * @param AuthService $authService
     * @param LogoutUserOutputInterface $output
     */
    public function __construct(AuthService $authService, LogoutUserOutputInterface $output)
    {
        $this->authService = $authService;
        $this->output = $output;
    }


    public function handle(): Response
    {
        $this->authService->logout();
        return $this->output->loggedOut();
    }
}
