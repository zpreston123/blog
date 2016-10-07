@extends('layouts.master')

@section('title', $post->title)

@section('content')
	<article>
		<header>
		    <h2>{{ $post->title }}</h2>
	    </header>
	    <p>{{ strip_tags($post->body) }}</p>
	    <footer>
	    	<p>
	        	<i class="fa fa-user"></i> Author: {{ $post->author->name }} |
	        	<i class="fa fa-calendar"></i> Published: {{ $post->created_at->diffForHumans() }}
	        </p>
	    </footer>
	</article>

	@include('comments.create')

	@if (count($post->comments) > 0)
		<div id="comments">
		    @include('comments.index')
	    </div>
    @endif
@stop
