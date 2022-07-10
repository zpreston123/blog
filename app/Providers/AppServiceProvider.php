<?php

namespace App\Providers;

use App\Http\View\Composers\{CategoryComposer, TagComposer};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['posts.create', 'posts.edit'], CategoryComposer::class);
        view()->composer(['posts.create', 'posts.edit'], TagComposer::class);
    }
}
