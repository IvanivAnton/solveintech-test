<?php

namespace App\Domain\UseCases;

use App\Domain\DTO\Input\RegisterUserInputDTO;
use App\Domain\DTO\Output\RegisterUserOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use App\Domain\OutputInterfaces\RegisterUserOutputInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;
use App\Factories\UserFactory;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class RegisterUserUseCase
{
    private UserFactory $factory;
    private UserRepository $repository;
    private RegisterUserOutputInterface $output;
    private AuthServiceInterface $authService;

    /**
     * @param UserFactory $factory
     * @param UserRepository $repository
     * @param RegisterUserOutputInterface $output
     * @param AuthServiceInterface $authService
     */
    public function __construct(
        UserFactory $factory,
        UserRepository $repository,
        RegisterUserOutputInterface $output,
        AuthServiceInterface $authService
    )
    {
        $this->factory = $factory;
        $this->repository = $repository;
        $this->output = $output;
        $this->authService = $authService;
    }

    public function handle(RegisterUserInputDTO $inputParams): ViewModelInterface
    {
        $user = $this->factory->make([
            'email' => $inputParams->getEmail(),
            'password' => $inputParams->getPassword()
        ]);

        $token = '';
        DB::transaction(function () use (&$user, &$token) {
            $user = $this->repository->save($user);
            $token = $this->repository->createApiToken($user);
        });

        $this->authService->login($user);

        return $this->output->registered(new RegisterUserOutputDTO($token));
    }
}
