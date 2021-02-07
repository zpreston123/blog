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
                @each('posts.post', $posts, 'post', 'posts.no-post')

                {{ $posts->links('vendor.pagination.bulma') }}
            </div>
        </div>
    </div>
@endsection
