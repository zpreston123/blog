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
        $profiles = User::where('name', 'LIKE', '%'.request('q').'%')
                    ->orderBy('name')
                    ->get();

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        $profile = $profile->withCount('posts', 'followers', 'followings')->findOrFail($profile->id);

        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $profile)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($profile->id)],
            'password' => ['min:6', 'confirmed']
        ]);

        $profile->update($attributes);

        flash()->success('Profile updated successfully!');

        return redirect('posts');
    }

    /**
     * Follow a user.
     *
     * @param  User $profile
     * @return User
     */
    public function follow(User $profile)
    {
        auth()->user()->follow($profile);

        return $profile;
    }

    /**
     * Unfollow a user.
     *
     * @param  User $profile
     * @return User
     */
    public function unfollow(User $profile)
    {
        auth()->user()->unfollow($profile);

        return $profile;
    }
}
