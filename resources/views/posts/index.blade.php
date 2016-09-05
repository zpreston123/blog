@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <form>
            <div class="input-field">
                <input id="search" type="search" required>
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
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
                                <p class="truncate">{{ $post->body }}</p>
                                <ul>
                                    <li style="display:inline;"><i class="fa fa-user" aria-hidden="true"></i> {{ $post->user->name }}</li>&nbsp;|&nbsp;
                                    <li style="display:inline;"><i class="fa fa-calendar" aria-hidden="true"></i> Published {{ $post->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                            <div class="card-action">
                                <a href="{{ url('posts/'.$post->id) }}">Read More</a>
                                @if ($post->user->id === auth()->id())
                                    <a href="{{ url('posts/'.$post->id.'/edit') }}">Edit</a>
                                    {{ Form::open(['route' => ['posts.destroy', $post->id], 'style' => 'display:inline;', 'method' => 'delete']) }}
                                        <button type="submit" class="waves-effect waves-light btn red deletePost">Delete</button>
                                    {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $posts->render() }}
        @else
            <p>No posts have been made!  Please check back later.</p>
        @endif
    </div>
@endsection
