<?php

namespace App\Adapters\Presenters;

use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginUserViewPresenter implements \App\Domain\Output\LoginUserOutputInterface
{

    public function authenticated(): Response
    {
        return new RedirectResponse(route('index'));
    }

    public function authFailed(): Response
    {
       return back()->withErrors(['password' => 'Login or email is incorrect']);
    }
}
