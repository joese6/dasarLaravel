<?php

namespace App\Providers;

use App\Http\Middleware\isAktif;
use App\Http\Middleware\isLogin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
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
        //
        Paginator::useBootstrapFive();
        Route::aliasMiddleware('isLogin', isLogin::class);
        Route::aliasMiddleware('isAktif', isAktif::class);
    }
}
