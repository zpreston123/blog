<?php

namespace Blog\Http\Controllers;

class UserController extends Controller
{
    public function myFavorites()
    {
        $myFavorites = auth()->user()->favorites;

        return view('users.my_favorites', compact('myFavorites'));
    }
}
