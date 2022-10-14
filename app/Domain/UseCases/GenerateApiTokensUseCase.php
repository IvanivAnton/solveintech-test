<?php

namespace App\Domain\UseCases;

use App\Domain\Output\GenerateApiTokenOutputInterface;
use App\Domain\OutputModels\GenerateApiTokenOutputModel;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\Response;

class GenerateApiTokensUseCase
{
    private AuthService $authService;
    private UserRepository $repository;
    private GenerateApiTokenOutputInterface $output;

    /**
     * @param AuthService $authService
     * @param UserRepository $repository
     * @param GenerateApiTokenOutputInterface $output
     */
    public function __construct(AuthService $authService, UserRepository $repository, GenerateApiTokenOutputInterface $output)
    {
        $this->authService = $authService;
        $this->repository = $repository;
        $this->output = $output;
    }


    public function handle(): Response
    {
        $user = $this->authService->user();
        $this->repository->dropApiTokens($user);
        $token = $this->repository->createApiToken($user);

        return $this->output->generated(new GenerateApiTokenOutputModel(token: $token));
    }
}
