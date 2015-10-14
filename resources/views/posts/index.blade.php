@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    @if (count($posts) != 0)
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-md-12 col-sm-9">
                            <h3><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>{{ mb_strimwidth(strip_tags($post->body), 0, 100, "...") }}</p>
                                    <p>
                                        @if ($post->user->id === $user->id)
                                           <a href="{{ url('posts/'.$post->id) }}" class="btn btn-info btn-sm">Read More</a>
                                        @endif
                                    </p>
                                    <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
                                    <ul class="list-inline">
                                        <li><i class="fa fa-calendar"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                                        <li>
                                            <a class="commentsLink" href="#comments" aria-expanded="false" aria-controls="comments"><i class="fa fa-comment"></i> {{ $post->comments()->count() }} Comments</a>
                                        </li>
                                    </ul>
                                    <div class="comments" style="display:none;">
                                        @include('comments.index', ['post' => $post, 'comments' => $post->comments->sortByDesc('created_at')])
                                    </div>
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
