<?php

namespace Blog\Http\Controllers;

use Blog\User;

class UserController extends Controller
{
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
