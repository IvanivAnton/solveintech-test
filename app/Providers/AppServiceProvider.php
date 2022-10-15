<?php

namespace App\Providers;

use App\Adapters\Presenters\GenerateApiTokenViewPresenter;
use App\Adapters\Presenters\GetQuotationsJsonPresenter;
use App\Adapters\Presenters\GetUserInfoViewPresenter;
use App\Adapters\Presenters\LoginUserViewPresenter;
use App\Adapters\Presenters\LogoutUserViewPresenter;
use App\Adapters\Presenters\RegisterUserViewPresenter;
use App\Domain\FactoryInterfaces\UserFactoryInterface;
use App\Domain\OutputInterfaces\GenerateApiTokenOutputInterface;
use App\Domain\OutputInterfaces\GetQuotationsOutputInterface;
use App\Domain\OutputInterfaces\GetUserInfoOutputInterface;
use App\Domain\OutputInterfaces\LoginUserOutputInterface;
use App\Domain\OutputInterfaces\LogoutUserOutputInterface;
use App\Domain\OutputInterfaces\RegisterUserOutputInterface;
use App\Domain\ServiceInterfaces\AuthServiceInterface;
use App\Domain\ServiceInterfaces\QuotationsServiceInterface;
use App\Domain\ServiceInterfaces\XmlParserServiceInterface;
use App\Domain\UseCases\GetQuotationsUseCase;
use App\Factories\UserFactory;
use App\Http\Controllers\UserPage\IndexController;
use App\Services\AuthService;
use App\Services\CbrQuotationsService;
use App\Services\XmlParserService;
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

        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(XmlParserServiceInterface::class, XmlParserService::class);
        $this->app->bind(QuotationsServiceInterface::class, CbrQuotationsService::class);

        $this->app->bind(UserFactoryInterface::class, UserFactory::class);

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
