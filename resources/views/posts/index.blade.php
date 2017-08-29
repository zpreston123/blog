@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                @include('posts.search')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                @forelse ($posts as $post)
                    <div class="box">
                        <h2>
                            <a class="post-title" href="posts/{{ $post->id }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p>{{ str_limit($post->body, 200) }}</p>
                        @unless ($post->tags->isEmpty())
                            <div class="tags">
                                @foreach ($post->tags as $tag)
                                    <span class="tag">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endunless
                        <p>{{ $post->author->name }}&nbsp;|&nbsp;Published {{ $post->created_at->diffForHumans() }}</p>
                        <favorite
                            :post={{ $post->id }}
                            :favorited={{ $post->favorited() ? 'true' : 'false' }}
                        ></favorite>
                    </div>
                @empty
                    <p>No posts have been made!  Please check back later.</p>
                @endforelse
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
