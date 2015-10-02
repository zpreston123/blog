@include('comments.create', ['post', $post])
@unless (count($comments) == 0)
    <ul class="list-group comments">
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
                                    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'id' => 'commentDeleteForm', 'method' => 'DELETE']) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'close', 'title' => 'Delete']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="comment-text">
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                </li>
        @endforeach
    </ul>
@endunless
