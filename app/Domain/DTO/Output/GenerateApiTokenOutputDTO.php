<?php

namespace App\Domain\DTO\Output;

class GenerateApiTokenOutputDTO
{
    /**
     * @param string $token
     */
    public function __construct(private string $token)
    {
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
