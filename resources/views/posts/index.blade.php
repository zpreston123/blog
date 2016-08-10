@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="row">
                <div class="col s12">
                    <h4><a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a></h4>
                </div>
                <div class="col s12">
                    <p class="truncate">{{ strip_tags($post->body) }}</p>
                    <a href="{{ url('posts/'.$post->id) }}" class="waves-effect waves-light btn">Read More</a>
                    @if ($post->user->id === auth()->id())
                        <a href="{{ url('posts/'.$post->id.'/edit') }}" class="waves-effect waves-light btn orange">Edit</a>
                        {{ Form::open(['route' => ['posts.destroy', $post->id], 'style' => 'display:inline;', 'method' => 'delete']) }}
                            <button type="submit" class="waves-effect waves-light btn red deletePost">Delete</button>
                        {{ Form::close() }}
                    @endif
                </div>
                <div class="col s12">
                    <ul>
                        <li style="display:inline;"><i class="fa fa-user" aria-hidden="true"></i> {{ $post->user->name }}</li>&nbsp;|&nbsp;
                        <li style="display:inline;"><i class="fa fa-calendar" aria-hidden="true"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>
            <div class="divider"></div>
        @endforeach
        {{ $posts->render() }}
    @else
        <p>No posts have been made!  Please check back later.</p>
    @endif
@endsection
