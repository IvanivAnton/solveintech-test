<?php

namespace App\Providers;

use App\Adapters\Presenters\GenerateApiTokenViewPresenter;
use App\Adapters\Presenters\GetQuotationsJsonPresenter;
use App\Adapters\Presenters\GetUserInfoViewPresenter;
use App\Adapters\Presenters\LoginUserViewPresenter;
use App\Adapters\Presenters\LogoutUserViewPresenter;
use App\Adapters\Presenters\RegisterUserViewPresenter;
use App\Domain\Output\GenerateApiTokenOutputInterface;
use App\Domain\Output\GetQuotationsOutputInterface;
use App\Domain\Output\GetUserInfoOutputInterface;
use App\Domain\Output\LoginUserOutputInterface;
use App\Domain\Output\LogoutUserOutputInterface;
use App\Domain\Output\RegisterUserOutputInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(GetUserInfoOutputInterface::class, GetUserInfoViewPresenter::class);
        $this->app->bind(GenerateApiTokenOutputInterface::class, GenerateApiTokenViewPresenter::class);
        $this->app->bind(LoginUserOutputInterface::class, LoginUserViewPresenter::class);
        $this->app->bind(LogoutUserOutputInterface::class, LogoutUserViewPresenter::class);
        $this->app->bind(RegisterUserOutputInterface::class, RegisterUserViewPresenter::class);
        $this->app->bind(GetQuotationsOutputInterface::class, GetQuotationsJsonPresenter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
