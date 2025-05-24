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
        $body = str(request('body'))->squish();

        return $post->comments()->save(
            (new Comment(['body' => $body]))->byAuthor(auth()->user())
        );
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return response('', 204);
    }
}
