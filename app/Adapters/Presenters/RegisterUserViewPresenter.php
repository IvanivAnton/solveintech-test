<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\ViewResponseViewModel;
use App\Domain\DTO\Output\RegisterUserOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use Illuminate\Http\RedirectResponse;

class RegisterUserViewPresenter implements \App\Domain\OutputInterfaces\RegisterUserOutputInterface
{
    public function registered(RegisterUserOutputDTO $model): ViewModelInterface
    {
        return new ViewResponseViewModel((new RedirectResponse(route('index')))->withCookie(
            cookie: cookie('token', $model->getToken())
        ));
    }
}
