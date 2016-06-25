<?php

namespace Blog\Http\Controllers;

class WelcomeController extends Controller
{
	/**
	 * Show welcome view.
	 *
	 * @return Response
	 */
    public function index()
    {
    	return view('welcome');
    }
}
