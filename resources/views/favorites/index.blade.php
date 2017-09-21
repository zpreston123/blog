@extends('layouts.master')

@section('title', 'My Favorites')

@section('content')
    <div class="row">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <h1 class="title">My Favorites</h1>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                @forelse ($favorites as $favorite)
                    <div class="box">
                        <h2>
                            <a class="post-title" href="posts/{{ $favorite->post->id }}">
                                {{ $favorite->post->title }}
                            </a>
                        </h2>
                        <p>{{ str_limit($favorite->post->body, 200) }}</p>
                        @unless ($favorite->post->tags->isEmpty())
                            <div class="tags">
                                @foreach ($favorite->post->tags as $tag)
                                    <span class="tag">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endunless
                        <p>
                            <i class="fa fa-user" aria-hidden="true"></i> {{ $favorite->post->author->name }}&nbsp;|&nbsp;
                            <i class="fa fa-clock-o" aria-hidden="true"></i> Published {{ $favorite->created_at->diffForHumans() }}
                        </p>
                    </div>
                @empty
                    <p>You have no favorite posts.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection