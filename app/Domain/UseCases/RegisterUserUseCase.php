<?php

namespace App\Domain\UseCases;

use App\Domain\InputParams\RegisterUserInputParams;
use App\Domain\Output\RegisterUserOutputInterface;
use App\Domain\OutputModels\RegisterUserOutputModel;
use App\Factories\UserFactory;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserUseCase
{
    private UserFactory $factory;
    private UserRepository $repository;
    private RegisterUserOutputInterface $output;
    private AuthService $authService;

    /**
     * @param UserFactory $factory
     * @param UserRepository $repository
     * @param RegisterUserOutputInterface $output
     * @param AuthService $authService
     */
    public function __construct(UserFactory $factory, UserRepository $repository, RegisterUserOutputInterface $output, AuthService $authService)
    {
        $this->factory = $factory;
        $this->repository = $repository;
        $this->output = $output;
        $this->authService = $authService;
    }

    public function handle(RegisterUserInputParams $inputParams): Response
    {
        $user = $this->factory->make([
            'email' => $inputParams->getEmail(),
            'password' => $inputParams->getPassword()
        ]);
        $token = '';
        DB::transaction(function () use (&$user, &$token){
            $user = $this->repository->save($user);
            $token = $this->repository->createApiToken($user);
        });

        $this->authService->login($user);

        return $this->output->registered(new RegisterUserOutputModel($token));
    }
}
