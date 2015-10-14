@extends('layouts.master')

@section('title', 'Show Post')

@section('content')
    <div class="page-header">
      <h1>{{ $post->title }} <small>by {{ $post->user->name }}</small></h1>
      <h3><small><i class="fa fa-calendar"></i> Published {{ $post->created_at->diffForHumans() }}</small></h3>
    </div>

    <p>{{ strip_tags($post->body) }}</p>
@stop
