<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Comment;
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

    public function store(Post $post, Request $request)
    {
        if ($request->ajax()) {
            $comment = new Comment(['body' => request('body')]);
            $comment->post()->associate($post);
            $comment->user()->associate(auth()->user());
            $comment->save();

            $post->comments()->save($comment);

            $html = view('comments.index', compact('post'))->render();

            return response()->json(['status' => 'success', 'msg' => 'Comment saved!', 'html' => $html]);
        }
    }
}
