<?php

namespace App\Domain\UseCases;

use App\Domain\DTO\Output\GenerateApiTokenOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use App\Domain\OutputInterfaces\GenerateApiTokenOutputInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;
use App\Repositories\UserRepository;

class GenerateApiTokensUseCase
{
    private AuthServiceInterface $authService;
    private UserRepository $repository;
    private GenerateApiTokenOutputInterface $output;

    /**
     * @param AuthServiceInterface $authService
     * @param UserRepository $repository
     * @param GenerateApiTokenOutputInterface $output
     */
    public function __construct(AuthServiceInterface $authService, UserRepository $repository, GenerateApiTokenOutputInterface $output)
    {
        $this->authService = $authService;
        $this->repository = $repository;
        $this->output = $output;
    }


    public function handle(): ViewModelInterface
    {
        $user = $this->authService->user();
        $this->repository->dropApiTokens($user);
        $token = $this->repository->createApiToken($user);

        return $this->output->generated(new GenerateApiTokenOutputDTO(token: $token));
    }
}
