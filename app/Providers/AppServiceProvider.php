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
        //
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
