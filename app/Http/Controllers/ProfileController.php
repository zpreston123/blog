<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Illuminate\Http\Request;
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
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = (!$request->has('password')) ? $user->password : bcrypt($request->input('password'));

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $user->name . time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->fit(300, 300)->save(public_path('uploads/avatars/' . $filename));

            $user->avatar = $filename;
        }

        $user->save();

        alert()->success('Your profile was successfully updated!');

        return redirect()->home();
    }
}
