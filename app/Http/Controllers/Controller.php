<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * Constructor.
     */
    public function __construct()
    {
        view()->share('user', auth()->user());
        view()->share('signedIn', auth()->check());
    }
}
