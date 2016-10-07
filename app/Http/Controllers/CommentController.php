<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Illuminate\Http\Request;

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
     * @param  Request $request
     * @return Response
     */
    public function store(Post $post, Request $request)
    {
        $post->newComment(auth()->user(), $request->all());

        return back();
    }
}
