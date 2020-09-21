<?php

namespace App\Http\Controllers;

use App\Models\{Comment, Post};

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return $post->comments()->with('author')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        return $post->addComment(auth()->user(), request('body'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return response('', 204);
    }
}
