<div class="well col-md-12">
    @include('comments.create', ['post', $post])<br>
    @unless (count($comments) == 0)
        <ul class="list-group comments">
            @foreach ($comments->load('user') as $comment)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-10 col-md-11">
                            <div>
                                <div class="mic-info">
                                    <a href="#">{{ $comment->user->name }}</a> on {{ $comment->updated_at->diffForHumans() }}
                                </div>
                                <div class="pull-right">
                                    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'id' => 'commentDeleteForm', 'method' => 'DELETE']) !!}
                                        {!! Form::button('<i class="fa fa-close"></i>', ['type' => 'submit', 'class' => 'close', 'title' => 'Delete']) !!}
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
</div>
