<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;
use Blog\User;

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
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User  $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }
}
