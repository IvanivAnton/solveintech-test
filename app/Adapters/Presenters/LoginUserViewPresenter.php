<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\ViewResponseViewModel;
use App\Domain\Entities\ViewModelInterface;
use Illuminate\Http\RedirectResponse;

class LoginUserViewPresenter implements \App\Domain\OutputInterfaces\LoginUserOutputInterface
{
    public function authenticated(): ViewModelInterface
    {
        return new ViewResponseViewModel(
            new RedirectResponse(route('index'))
        );
    }

    public function authFailed(): ViewModelInterface
    {
       return new ViewResponseViewModel(
           back()->withErrors(['password' => 'Login or email is incorrect'])
       );
    }
}
