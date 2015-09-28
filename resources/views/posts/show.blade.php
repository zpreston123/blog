@extends('layouts.master')

@section('title', 'Show Post')

@section('content')
    <div class="page-header">
      <h1>{{ $post->title }} <small>by {{ $post->user->name }}</small></h1>
    </div>

    <p>{{ strip_tags($post->body) }}</p>

    <hr>

    @include('comments.index', ['comments' => $post->comments->sortByDesc('created_at')])
@stop
