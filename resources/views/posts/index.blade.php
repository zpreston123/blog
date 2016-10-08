@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        {!! Form::open(['url' => 'posts/search', 'method' => 'GET']) !!}
            {!! Form::text('q', old('q'), ['type' => 'search', 'class' => 'search', 'placeholder' => 'Search...']) !!}
        {!! Form::close() !!}
    </div>
    <div class="row">
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title red-text text-lighten-2">
                                    <strong>{{ $post->title }}</strong>
                                </span>
                                <p>{{ str_limit($post->body, 200) }}</p>
                                <ul>
                                    <li style="display:inline;"><i class="fa fa-user" aria-hidden="true"></i> {{ $post->author->name }}</li>&nbsp;|&nbsp;
                                    <li style="display:inline;"><i class="fa fa-calendar" aria-hidden="true"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                            <div class="card-action">
                                <a href="{{ url('posts/'.$post->id) }}" class="waves-effect waves-light btn">Read More</a>
                                @if ($post->author->id === auth()->id())
                                    <a href="{{ url('posts/'.$post->id.'/edit') }}" class="waves-effect waves-light btn amber darken-2">Edit</a>
                                    {{ Form::open(['route' => ['posts.destroy', $post->id], 'style' => 'display:inline;', 'method' => 'delete']) }}
                                        <button type="submit" class="waves-effect waves-light btn red deletePost">Delete</button>
                                    {{ Form::close() }}
                                @endif
                            </div>
                        </div>
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
