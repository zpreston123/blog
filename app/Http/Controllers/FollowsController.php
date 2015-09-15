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
     * @return Response
     */
    public function store()
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
