<?php

namespace Blog\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $follower = User::findOrFail(request('follower_id'));

        Follower::create([
            'user_id' => auth()->id(),
            'follower_id' => $follower
        ]);

        return $follower;
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
