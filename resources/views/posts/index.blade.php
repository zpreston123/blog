@extends('layouts.master')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                {!! Form::open(['url' => 'posts/search', 'style' => 'padding-bottom:40px;', 'method' => 'GET']) !!}
                    {!! Form::text('q', old('q'), ['type' => 'search', 'class' => 'search', 'placeholder' => 'Search...']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="box">
                            <h2>
                                <a class="post-title" href="{{ route('posts.show', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p>{{ str_limit($post->body, 200) }}</p>
                            @unless($post->tags->isEmpty())
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
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>No posts have been made!  Please check back later.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
