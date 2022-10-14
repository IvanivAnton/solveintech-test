<?php

namespace App\Adapters\Presenters;

use App\Domain\OutputModels\RegisterUserOutputModel;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserViewPresenter implements \App\Domain\Output\RegisterUserOutputInterface
{
    public function registered(RegisterUserOutputModel $model): Response
    {
        return (new RedirectResponse(route('index')))->withCookie(
            cookie: cookie('token', $model->getToken())
        );
    }
}
