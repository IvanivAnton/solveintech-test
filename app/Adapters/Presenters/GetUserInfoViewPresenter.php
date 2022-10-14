<?php

namespace App\Adapters\Presenters;

use App\Domain\OutputModels\GetUserInfoOutputModel;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class GetUserInfoViewPresenter implements \App\Domain\Output\GetUserInfoOutputInterface
{

    public function success(GetUserInfoOutputModel $model): Response
    {
        return new \Illuminate\Http\Response(View::make(
            'index',
            [
                'isUserLogged' => $model->isUserLogged(),
                'apiToken' => $model->getApiToken(),
                'loginUrl' => $model->getLoginUrl(),
                'registerUrl' => $model->getRegisterUrl(),
                'regenerateTokenUrl' => $model->getRegenerateTokenUrl(),
                'logoutUrl'  => $model->getLogoutUrl(),
            ]
        ));
    }
}
