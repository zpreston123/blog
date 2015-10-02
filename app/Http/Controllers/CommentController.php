<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Comment;
use Blog\Http\Requests;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $post = Post::find(base64_decode($request->input('post_id')));

            $comment = new Comment;
            $comment->body = $request->input('body');
            $comment->user()->associate($request->user()->id);
            $comment->post()->associate($post->id);
            $comment->save();

            $post->comments()->save($comment);

            $comments = $post->comments->sortByDesc('created_at');

            return response()->view('comments.index', compact('post', 'comments'));
        }//end if
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->view('comments.index');
    }
}
