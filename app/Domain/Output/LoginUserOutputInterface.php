<?php

namespace App\Domain\Output;

use Symfony\Component\HttpFoundation\Response;

interface LoginUserOutputInterface
{
    public function authenticated(): Response;
    public function authFailed(): Response;
}
