<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Comment;

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
     * Display a listing of the resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return Comment::with('author')->byPost($post)
                    ->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Post $post
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Post $post)
    {
        return $post->addComment(
            auth()->user(), ['body' => request('body')]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @param  Comment $comment
     * @return Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Comment removed successfully!'
        ]);
    }
}
