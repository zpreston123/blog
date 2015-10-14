<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $searchUsers = User::whereNotIn('id', [auth()->id()])->get();

        view()->share('searchUsers', collect($searchUsers)->pluck('name')->all());
        view()->share('user', auth()->user());
        view()->share('signedIn', auth()->check());
    }
}
