<?php

namespace App\Providers;

use App\Http\View\Composers\{CategoryComposer, TagComposer};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['posts.create', 'posts.edit'], CategoryComposer::class);
        view()->composer(['posts.create', 'posts.edit'], TagComposer::class);
    }
}
