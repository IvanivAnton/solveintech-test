<?php

namespace App\Adapters\Presenters;

use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LogoutUserViewPresenter implements \App\Domain\Output\LogoutUserOutputInterface
{
    public function loggedOut(): Response
    {
        return (new RedirectResponse(route('index')))->withCookie('token');
    }
}
