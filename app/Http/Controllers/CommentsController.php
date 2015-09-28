<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Comment;
use Blog\Http\Requests;
use Illuminate\Http\Request;
use Blog\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $post = Post::find(base64_decode($request->input('post_id')));
        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->user()->associate($request->user()->id);
        $comment->post()->associate($post->id);
        $comment->save();

        $post->comments()->save($comment);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
