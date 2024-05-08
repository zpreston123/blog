<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfileAvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(User $profile)
    {
    	request()->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png']
    	]);

        $avatar = request()->file('avatar');
        $filename = $profile->name . time() . '.' . $avatar->getClientOriginalExtension();

        Image::make($avatar)->resize(300, 300)->save(public_path('images/avatars/' . $filename));

        $profile->update(['avatar' => $filename]);

        return to_route('posts.index');
    }
}
