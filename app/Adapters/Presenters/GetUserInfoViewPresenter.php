<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\ViewResponseViewModel;
use App\Domain\DTO\Output\GetUserInfoOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use Illuminate\Support\Facades\View;

class GetUserInfoViewPresenter implements \App\Domain\OutputInterfaces\GetUserInfoOutputInterface
{
    public function success(GetUserInfoOutputDTO $model): ViewModelInterface
    {
        $response = new \Illuminate\Http\Response(View::make(
            'index',
            [
                'isUserLogged' => $model->isUserLogged(),
                'loginUrl' => $model->getLoginUrl(),
                'registerUrl' => $model->getRegisterUrl(),
                'regenerateTokenUrl' => $model->getRegenerateTokenUrl(),
                'logoutUrl'  => $model->getLogoutUrl(),
            ]
        ));
        return new ViewResponseViewModel($response);
    }
}
