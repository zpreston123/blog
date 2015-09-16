<div id="comments" style="display:none;">
    @include('comments.create')
    @unless (count($comments) == 0)
        <ul class="list-group">
            @foreach ($comments->chunk(3) as $comment)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-2 col-md-1">
                        <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                        <div class="col-xs-10 col-md-11">
                            <div>
                                <div class="mic-info">
                                    <a href="#">{{ $comment->user->name }}</a> on {{ $comment->updated_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="comment-text">
                                {{ $comment->body }}
                            </div>
                            <div class="action">
                                @if ($comment->user->id === $user->id)
                                    <button type="button" class="btn btn-success btn-xs" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                    </button>
                                @endif
                                <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><i class="fa fa-refresh"></i> Show More</a>
    @endunless
</div>
