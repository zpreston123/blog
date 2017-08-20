<?php

namespace Blog\Http\Controllers;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the authenticated
	 * user's favorite posts.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function myFavorites()
    {
        $myFavorites = auth()->user()->favorites;

        return view('users.my_favorites', compact('myFavorites'));
    }
}
