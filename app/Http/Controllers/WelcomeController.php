<?php

namespace Blog\Http\Controllers;

class WelcomeController extends Controller
{
	/**
	 * Show welcome view.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
    	return view('welcome');
    }
}
