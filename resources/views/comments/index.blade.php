@include('comments.create', ['post', $post])
@unless (count($comments) == 0)
    <ul class="list-group">
        @foreach ($comments->load('user') as $comment)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-2 col-md-1">
                        <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                        <div class="col-xs-10 col-md-11">
                            <div>
                                <div class="mic-info">
                                    <a href="#">{{ $comment->user->name }}</a> on {{ $comment->updated_at->diffForHumans() }}
                                </div>
                                <div class="pull-right">
                                    {!! Form::open(['url' => 'comment/delete/'.$comment->id, 'id' => 'commentsForm', 'method' => 'DELETE']) !!}
                                        <button type="submit" title="Delete" onclick="return confirm('Are you sure you want to delete this comment?');" class="close" data-dismiss="alert" aria-label="Delete">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="comment-text">
                                {{ $comment->body }}
                                @if ($comment->user->id === $user->id)
                                    <a href="#"><small>Edit</small></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
        @endforeach
    </ul>
    <a href="#" class="btn btn-primary btn-md btn-block" role="button"><i class="fa fa-refresh"></i> Show More</a>
@endunless
