<?php

namespace App\Domain\UseCases;

use App\Domain\InputParams\LoginUserInputParams;
use App\Domain\Output\LoginUserOutputInterface;
use App\Factories\UserFactory;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\Response;

class LoginUserUseCase
{
    private UserFactory $userFactory;
    private AuthService $authService;
    private LoginUserOutputInterface $output;

    /**
     * @param UserFactory $userFactory
     * @param AuthService $authService
     * @param LoginUserOutputInterface $output
     */
    public function __construct(UserFactory $userFactory, AuthService $authService, LoginUserOutputInterface $output)
    {
        $this->userFactory = $userFactory;
        $this->authService = $authService;
        $this->output = $output;
    }


    public function handle(LoginUserInputParams $inputParams): Response
    {
        $user = $this->userFactory->make([
            'email' => $inputParams->getEmail(),
            'password' => $inputParams->getPassword(),
        ]);

        if(!$this->authService->attempt($user)) {
            return $this->output->authFailed();
        }
        session()->regenerate();

        return $this->output->authenticated();
    }
}
