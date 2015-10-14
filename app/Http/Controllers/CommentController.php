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

$html = '
<li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-2 col-md-1">
                        <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                        <div class="col-xs-10 col-md-11">
                            <div>
                                <div class="mic-info">
                                    <a href="#">'.$comment->user->name.'</a> on '.$comment->updated_at->diffForHumans().'
                                </div>
                                <div class="pull-right">
                                    <form action="comments/destroy/'.$comment->id.'" id="commentDeleteForm" method="delete">
                                        <button type="submit" class="close" title="Delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="comment-text">'.$comment->body.'</div>
                        </div>
                    </div>
                </li>
';
            return response()->json(compact('html'));
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
