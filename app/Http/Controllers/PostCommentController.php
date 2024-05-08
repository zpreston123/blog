<?php

namespace App\Http\Controllers;

use App\Models\{Comment, Post};

class PostCommentController extends Controller
{
    public function index(Post $post)
    {
        return $post->comments()->with('author')->latest()->get();
    }

    public function store(Post $post)
    {
        return $post->addComment(
            auth()->user(),
            str(request('body'))->squish()
        );
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return response('', 204);
    }
}
