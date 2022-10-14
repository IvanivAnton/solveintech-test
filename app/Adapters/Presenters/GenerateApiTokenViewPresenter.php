<?php

namespace App\Adapters\Presenters;

use App\Domain\OutputModels\GenerateApiTokenOutputModel;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class GenerateApiTokenViewPresenter implements \App\Domain\Output\GenerateApiTokenOutputInterface
{
    public function generated(GenerateApiTokenOutputModel $model): Response
    {
        return (new RedirectResponse(route('index')))->withCookie(
            cookie('token', $model->getToken())
        );
    }
}
