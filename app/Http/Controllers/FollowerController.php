<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Blog\Follower;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followers = auth()->user()->following()->orderBy('name')->get();

        return view('followers.index', compact('followers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store()
    {
        $user = User::findOrFail(request('user_id'));

        return Follower::create([
            'user' => auth()->user(),
            'follow' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Follower $follower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follower $follower)
    {
        $follower->delete();

        return response('', 204);
    }
}
