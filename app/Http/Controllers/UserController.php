<?php

namespace Blog\Http\Controllers;

class UserController extends Controller
{
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
