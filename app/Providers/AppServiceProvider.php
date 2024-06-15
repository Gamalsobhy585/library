<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router; // Correct namespace for Router

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
    public function boot(Router $router): void
    {
        Paginator::useBootstrap();

        // Register the isSuperAdmin middleware
        $router->aliasMiddleware('isSuperAdmin', \App\Http\Middleware\isSuperAdmin::class);
    }
}
