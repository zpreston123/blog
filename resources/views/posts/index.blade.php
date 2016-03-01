@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    @if (count($posts) > 0)
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-md-12 col-sm-9">
                            <h3><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h3>
                            <div class="row">
                                <div class="col-md-8 col-xs-12">
                                    <p>{{ mb_strimwidth(strip_tags($post->body), 0, 100, "...") }}</p>
                                    <p>
                                        @if ($post->user->id === $user->id)
                                           <a href="{{ url('posts/'.$post->id) }}" class="btn btn-info btn-sm">Read More</a>
                                        @endif
                                    </p>
                                    {{-- @if(count($post->tags) > 0) --}}
                                        <!-- <p class="pull-right"> -->
                                            {{-- @foreach ($post->tags as $tag)
                                                <span class="label label-default">{{ $tag->name }}</span>
                                            @endforeach --}}
                                        <!-- </p> -->
                                    {{-- @endif --}}
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i> {{ $post->user->name }}</li>
                                        <li><i class="fa fa-calendar"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                                        <li>
                                            <a class="commentsLink" href="#comments" aria-expanded="false" aria-controls="comments"><i class="fa fa-comment"></i> {{ $post->comments()->count() }} Comments</a>
                                        </li>
                                    </ul>
                                    @include('comments.index', ['post' => $post])
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
