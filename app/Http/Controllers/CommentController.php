<?php

namespace Blog\Http\Controllers;

use Blog\Post;

class CommentController extends Controller
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
     * @param  Post $post
     * @return Response
     */
    public function store(Post $post)
    {
        $post->newComment(auth()->user(), request()->all());

        return back();
    }
}
