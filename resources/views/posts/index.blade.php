@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    @if ($posts->count() > 0)
        <div class="row">
            <div class="col l12">
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col l12 col m9">
                            <h3><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h3>
                            <div class="row">
                                <div class="col l8 col s12">
                                    <p>{{ mb_strimwidth(strip_tags($post->body), 0, 100, "...") }}</p>
                                    <p>
                                       <a href="{{ url('posts/'.$post->id) }}" class="waves-effect waves-light btn">Read More</a>
                                    </p>
                                    {{-- @if($post->tags->count() > 0) --}}
                                        <!-- <p class="pull-right"> -->
                                            {{-- @foreach ($post->tags as $tag) --}}
                                                <!-- <span class="label label-default">{{-- $tag->name --}}</span> -->
                                            {{-- @endforeach --}}
                                        <!-- </p> -->
                                    {{-- @endif --}}
                                    <ul>
                                        <li><i class="fa fa-user"></i> {{ $post->user->name }}</li>
                                        <li><i class="fa fa-calendar"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                                        <li>
                                            <a class="commentsLink" href="#comments"><i class="fa fa-comment"></i> {{ $post->comments()->count() }} Comments</a>
                                        </li>
                                    </ul>
                                    {{-- @include('comments.index', ['post' => $post]) --}}
                                </div>
                                <div class="col s3"></div>
                            </div><br><br>
                        </div>
                    </div>
                    <hr>
                @endforeach
                {{ $posts->render() }}
            </div>
        </div>
    @else
        <p>No posts have been made!  Please check back later.</p>
    @endif
@endsection
