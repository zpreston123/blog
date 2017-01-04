@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        {!! Form::open(['url' => 'posts/search', 'style' => 'padding-bottom:40px;', 'method' => 'GET']) !!}
            {!! Form::text('q', old('q'), ['type' => 'search', 'class' => 'search', 'placeholder' => 'Search...']) !!}
        {!! Form::close() !!}
    </div>
    <div class="row">
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="box">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ str_limit($post->body, 200) }}</p>
                    <div style="display:block; padding-bottom:20px;">
                        <span>{{ $post->author->name }}</li>&nbsp;|&nbsp;Published {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div style="display:block;">
                        <a href="{{ url('posts/'.$post->id) }}" class="button is-primary">Read More</a>
                        @if ($post->author->id === auth()->id())
                            <a href="{{ url('posts/'.$post->id.'/edit') }}" class="button is-info">Edit</a>
                            {{ Form::open(['route' => ['posts.destroy', $post->id], 'style' => 'display:inline;', 'method' => 'delete']) }}
                                <button type="submit" class="button is-danger">Delete</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="center-align">
                {{ $posts->render() }}
            </div>
        @else
            <p>No posts have been made!  Please check back later.</p>
        @endif
    </div>
@endsection
