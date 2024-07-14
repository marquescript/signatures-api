<?php

namespace App\Providers;

use App\Models\User;
use App\Service\AuthService;
use App\Service\PlanService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthServiceInterface::class, fn() => new AuthService(new User()));
    }
}
