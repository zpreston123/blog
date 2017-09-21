<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('name', 'LIKE', '%'.request('q').'%')
                    ->orderBy('name')
                    ->get();

        return view('profiles.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $profileUser = User::withCount('posts', 'favorites', 'followers', 'following')->findOrFail($user->id);

        return view('profiles.show', compact('profileUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profiles.edit', ['profileUser' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
        request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'.Rule::unique('users')->ignore($user->id),
            'password' => 'min:6|confirmed'
        ]);

        $user->update(request()->only('name', 'email', 'password'));

        flash()->success('Profile updated successfully!');

        return redirect('posts');
    }
}
