<?php

namespace App\Adapters\ViewModels;

use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseViewModel implements \App\Domain\Entities\ViewModelInterface
{
    public function __construct(private JsonResponse $resource)
    {
    }

    public function getResponse(): JsonResponse
    {
        return $this->resource;
    }
}
