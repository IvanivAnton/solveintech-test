<?php

namespace App\Adapters\ViewModels;

use App\Domain\Entities\ViewModelInterface;
use Symfony\Component\HttpFoundation\Response;

class ViewResponseViewModel implements ViewModelInterface
{
    public function __construct(private Response $response)
    {
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
