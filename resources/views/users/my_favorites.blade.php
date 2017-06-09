@extends('layouts.master')

@section('title', 'My Favorites')

@section('content')
    <h1 class="title">My Favorites</h1>

    <hr>

    <div class="row">
        @forelse ($myFavorites as $myFavorite)
            <div class="box">
                <h2>{{ $myFavorite->title }}</h2>
                <p>{{ $myFavorite->body }}</p>
                @unless($myFavorite->tags->isEmpty())
                    <ul class="tags" style="list-style-type: none; margin: 0;">
                        @foreach ($myFavorite->tags as $tag)
                           <li style="display: inline-block;">
                                <span class="tag is-info is-medium">
                                    {{ $tag->name }}
                                </span>
                            </li>
                        @endforeach
                    </ul><br>
                @endunless
                <p>{{ $myFavorite->author->name }}&nbsp;|&nbsp;Published {{ $myFavorite->created_at->diffForHumans() }}</p>
                <a href="{{ url('posts/'.$myFavorite->id) }}" class="button is-primary">Read More</a>
            </div>
        @empty
            <p>You have no favorite posts.</p>
        @endforelse
    </div>
@endsection
