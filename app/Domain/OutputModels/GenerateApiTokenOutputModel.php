<?php

namespace App\Domain\OutputModels;

class GenerateApiTokenOutputModel
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
