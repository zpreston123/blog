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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //Follow a user
        auth()->user()->following()->attach($id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Unfollow a user
        auth()->user()->following()->detach($id);

        return back();
    }
}
