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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::whereNotIn('id', [auth()->id()])->get();

        return view('profiles.index', compact('users'));
    }
}
