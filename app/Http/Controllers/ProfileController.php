<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

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
     * Display the specified resource.
     *
     * @param  User $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
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
        $this->validate(request(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'.Rule::unique('users')->ignore($profile->id),
            'password' => 'min:6|confirmed',
            'avatar' => 'image|mimes:jpeg,png'
        ]);

        $profile->name = request('name');
        $profile->email = request('email');
        $profile->password = (!request()->has('password')) ? $profile->password : bcrypt(request('password'));

        if (request()->hasFile('avatar')) {
            $avatar = request()->file('avatar');
            $filename = $profile->name . time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->fit(300, 300)->save(public_path('uploads/avatars/' . $filename));

            $profile->avatar = $filename;
        }

        $profile->save();

        return redirect('posts');
    }
}
