<?php

namespace App\Providers;

use App\Policies\AuthPolicy;
use App\Policies\CadastroPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define("can-sign-in", [AuthPolicy::class, 'canSignIn']);
        Gate::define("view-cadastro", [CadastroPolicy::class, 'view']);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        URL::forceRootUrl(config('app.url'));
    }
}
