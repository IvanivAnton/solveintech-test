<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\ViewResponseViewModel;
use App\Domain\Entities\ViewModelInterface;
use Illuminate\Http\RedirectResponse;

class LogoutUserViewPresenter implements \App\Domain\OutputInterfaces\LogoutUserOutputInterface
{
    public function loggedOut(): ViewModelInterface
    {
        return new ViewResponseViewModel(
            (new RedirectResponse(route('index')))->withCookie('token')
        );
    }
}
