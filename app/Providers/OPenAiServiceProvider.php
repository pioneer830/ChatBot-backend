<?php

namespace App\Providers;

use App\Contracts\OpenAiInterface;
use App\Contracts\OpenAiServiceInterface;
use App\Repositories\OpenAiRepository;
use App\Service\OpenAiService;
use Illuminate\Support\ServiceProvider;

class OPenAiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OpenAiInterface::class, OpenAiRepository::class);
        $this->app->bind(OpenAiServiceInterface::class, OpenAiService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
