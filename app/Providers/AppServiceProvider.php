<?php

namespace App\Providers;

use App\Http\View\Composers\{CategoryComposer, TagComposer};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer(['posts.create', 'posts.edit'], CategoryComposer::class);
        view()->composer(['posts.create', 'posts.edit'], TagComposer::class);
    }
}
