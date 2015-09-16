@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    @if (count($posts) != 0)
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="row"><br>
                        <div class="col-md-2 col-sm-3 text-center">
                            <a href="#"><img src="//placehold.it/100" style="width:100px;height:100px" class="img-circle"></a>
                        </div>
                        <div class="col-md-10 col-sm-9">
                            <h3><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h3>
                            <div class="row">
                                <div class="col-xs-9">
                                    <p>{{ mb_strimwidth(strip_tags($post->body), 0, 100, "...") }}</p>
                                    <p class="lead">
                                        @if ($post->user->id === $user->id)
                                        <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit Post</a>
                                        @endif
                                    </p>
                                    <ul class="list-inline">
                                        <li><i class="fa fa-clock-o"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                                        <li><a id="commentsLink" href="#"><i class="fa fa-comment"></i> {{ $post->comments()->count() }} Comments</a></li>
                                    </ul>
                                    @include('comments.index', ['comments' => $post->comments])
                                </div>
                                <div class="col-xs-3"></div>
                            </div><br><br>
                        </div>
                    </div><!--/row-->
                    <hr>
                @endforeach
                {{ $posts->render() }}
            </div><!--/col-12-->
        </div><!--/row-->
    @else
        <p>No posts have been made!  Please check back later.</p>
    @endif
@endsection
