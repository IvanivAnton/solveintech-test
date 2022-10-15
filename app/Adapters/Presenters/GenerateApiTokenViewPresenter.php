<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\ViewResponseViewModel;
use App\Domain\DTO\Output\GenerateApiTokenOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use Illuminate\Http\RedirectResponse;

class GenerateApiTokenViewPresenter implements \App\Domain\OutputInterfaces\GenerateApiTokenOutputInterface
{
    public function generated(GenerateApiTokenOutputDTO $model): ViewModelInterface
    {
        $redirectResponse = (new RedirectResponse(route('index')))->withCookie(
            cookie('token', $model->getToken())
        );

        return new ViewResponseViewModel($redirectResponse);
    }
}
