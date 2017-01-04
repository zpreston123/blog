<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
	/**
     * Show the form for editing the specified resource.
     *
     * @param  User  $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('profiles.edit', ['user' => auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update()
    {
        $user = auth()->user();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = (!request()->has('password')) ? $user->password : bcrypt(request('password'));

        if (request()->hasFile('avatar')) {
            $avatar = request()->file('avatar');
            $filename = $user->name . time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->fit(300, 300)->save(public_path('uploads/avatars/' . $filename));

            $user->avatar = $filename;
        }

        $user->save();

        alert()->success('Your profile was successfully updated!');

        return redirect()->home();
    }
}
