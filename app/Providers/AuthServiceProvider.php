<?php

namespace App\Providers;

use App\Models\Plan;
use App\Models\User;
use App\Policies\PlanPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Plan::class => PlanPolicy::class
    ];
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
//        Gate::define('auth-admin', function (User $user) {
//            return $user->name == "carlos";
//        });
    }
}
