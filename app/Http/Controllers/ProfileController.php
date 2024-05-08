<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profiles = User::where('name', 'LIKE', '%'.request('q').'%')
                    ->orderBy('name')
                    ->paginate(10);

        return view('profiles.index', compact('profiles'));
    }

    public function show(User $profile)
    {
        $profile = $profile->withCount('posts', 'followers', 'followings')->findOrFail($profile->id);

        return view('profiles.show', compact('profile'));
    }

    public function edit(User $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(User $profile)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($profile->id)],
            'password' => ['min:6', 'confirmed']
        ]);

        $profile->update($attributes);

        flash()->success('Profile updated successfully!');

        return to_route('posts.index');
    }

    public function follow(User $profile)
    {
        auth()->user()->follow($profile);

        return $profile;
    }

    public function unfollow(User $profile)
    {
        auth()->user()->unfollow($profile);

        return $profile;
    }
}
