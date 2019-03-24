<?php

namespace Blog\Http\Controllers;

use Blog\Post;

class LikeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store()
    {
        $post = Post::findOrFail(request('post_id'));

        auth()->user()->like($post);

        return $post->likesCount;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        auth()->user()->unlike($post);

        return response('', 204);
    }
}
