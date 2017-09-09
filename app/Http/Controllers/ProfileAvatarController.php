<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Intervention\Image\Facades\Image;

class ProfileAvatarController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
    	request()->validate([
            'avatar' => 'required|image|mimes:jpeg,png'
    	]);

        $avatar = request()->file('avatar');
        $filename = $user->name . time() . '.' . $avatar->getClientOriginalExtension();

        Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));

        $user->update(['avatar' => $filename]);

        return redirect('posts');
    }
}
