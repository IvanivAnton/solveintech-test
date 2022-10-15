<?php

namespace App\Domain\UseCases;

use App\Domain\DTO\Input\LoginUserInputDTO;
use App\Domain\Entities\UserEntityInterface;
use App\Domain\Entities\ViewModelInterface;
use App\Domain\FactoryInterfaces\UserFactoryInterface;
use App\Domain\OutputInterfaces\LoginUserOutputInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;
use App\Factories\UserFactory;

class LoginUserUseCase
{
    private UserFactoryInterface $userFactory;
    private AuthServiceInterface $authService;
    private LoginUserOutputInterface $output;

    /**
     * @param UserFactoryInterface $userFactory
     * @param AuthServiceInterface $authService
     * @param LoginUserOutputInterface $output
     */
    public function __construct(UserFactoryInterface $userFactory, AuthServiceInterface $authService, LoginUserOutputInterface $output)
    {
        $this->userFactory = $userFactory;
        $this->authService = $authService;
        $this->output = $output;
    }


    public function handle(LoginUserInputDTO $inputParams): ViewModelInterface
    {
        $user = $this->userFactory->make([
            'email' => $inputParams->getEmail(),
            'password' => $inputParams->getPassword(),
        ]);

        if(!$this->authService->attempt($user)) {
            return $this->output->authFailed();
        }

        return $this->output->authenticated();
    }
}
