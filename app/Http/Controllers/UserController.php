<?php

namespace Blog\Http\Controllers;

use Blog\User;

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

 	public function search()
 	{
 	    $users = User::where('name', 'LIKE', '%'.request('q').'%')
 	    			->orderBy('name')
 	    			->get();

 	    return view('users.index', compact('users'));
 	}
}
