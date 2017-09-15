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

    {

    }

 	public function search()
 	{
 	    $users = User::where('name', 'LIKE', '%'.request('q').'%')
 	    			->orderBy('name')
 	    			->get();

 	    return view('users.index', compact('users'));
 	}
}
