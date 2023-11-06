<?php

namespace App\Providers;

use App\Contracts\AboutInterface;
use App\Contracts\AboutBaseInterface;
use App\Contracts\CharacterLengthBaseInterface;
use App\Contracts\GuestHelperInterface;
use App\Contracts\HomeBaseInterface;
use App\Contracts\HomeServiceInterface;
use App\Contracts\IntentionBaseInterface;
use App\Contracts\LoginBaseInterface;
use App\Contracts\LoginServiceInterface;
use App\Contracts\RegisterBaseInterface;
use App\Contracts\RegisterServiceInterface;
use App\Contracts\ToneBaseInterface;
use App\Contracts\UserCharacterLengthInterface;
use App\Contracts\UserIntentionInterface;
use App\Contracts\UserInterface;
use App\Contracts\UserToneInterface;
use App\Helper\GuestHelper;
use App\Repositories\AboutRepository;
use App\Repositories\CharacterLengthRepository;
use App\Repositories\HomeRepository;
use App\Repositories\IntentionRepository;
use App\Repositories\LoginRepository;
use App\Repositories\RegisterRepository;
use App\Repositories\ToneRepository;
use App\Service\AboutService;
use App\Service\HomeService;
use App\Service\LoginService;
use App\Service\RegisterService;
use App\Service\UserCharacterLengthService;
use App\Service\UserIntentionService;
use App\Service\UserService;
use App\Service\UserToneService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AboutBaseInterface::class, AboutRepository::class);
        $this->app->bind(AboutInterface::class, AboutService::class);
        $this->app->bind(ToneBaseInterface::class, ToneRepository::class);
        $this->app->bind(UserToneInterface::class, UserToneService::class);
        $this->app->bind(IntentionBaseInterface::class, IntentionRepository::class);
        $this->app->bind(UserIntentionInterface::class, UserIntentionService::class);
        $this->app->bind(CharacterLengthBaseInterface::class, CharacterLengthRepository::class);
        $this->app->bind(UserCharacterLengthInterface::class, UserCharacterLengthService::class);
        $this->app->bind(GuestHelperInterface::class, GuestHelper::class);


        $this->app->bind(HomeBaseInterface::class, HomeRepository::class);
        $this->app->bind(HomeServiceInterface::class, HomeService::class);
        $this->app->bind(LoginBaseInterface::class, LoginRepository::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(RegisterBaseInterface::class, RegisterRepository::class);
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
        $this->app->bind(UserInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
