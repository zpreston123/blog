<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Image;

class ProfileAvatarController extends Controller
{
    public function update(User $profile)
    {
    	request()->validate([
            'avatar' => 'required|image|mimes:jpeg,png'
    	]);

        $avatar = request()->file('avatar');
        $filename = $profile->name . time() . '.' . $avatar->getClientOriginalExtension();

        Image::make($avatar)->fit(300, 300)->save(public_path('uploads/avatars/' . $filename));

        $profile->update(['avatar' => $filename]);

        return redirect('posts');
    }
}
