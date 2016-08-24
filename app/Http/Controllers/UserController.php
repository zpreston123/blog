<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;
use Blog\User;
use File;
use Image;

class UserController extends Controller
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
     * @return Response
     */
    public function index()
    {
        $users = User::whereNotIn('id', [auth()->id()])->get();

        return view('profiles.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

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
     * @param  Request  $request
     * @param  User  $id
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return 'Done';
    }
}
