<?php

namespace Blog\Http\Controllers;

use Blog\User;
use Blog\Http\Requests;
use Illuminate\Http\Request;
use Blog\Http\Controllers\Controller;

class FollowsController extends Controller
{
    /**
     * Follow a user.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Unfollow a user.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {

    }
}
