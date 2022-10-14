<?php

namespace App\Domain\Output;

use Symfony\Component\HttpFoundation\Response;

interface LogoutUserOutputInterface
{
    public function loggedOut(): Response;
}
