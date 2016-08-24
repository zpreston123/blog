@extends('layouts.master')

@section('title', 'Show Post')

@section('content')
	<article>
		<header>
		    <h1>{{ $post->title }}</h1>
	    </header>
	    <p>{{ strip_tags($post->body) }}</p>
	    <footer>
	    	<p>
	        	<i class="fa fa-user"></i> Author: {{ $post->user->name }} |
	        	<i class="fa fa-calendar"></i> Published: {{ $post->created_at->diffForHumans() }}
	        </p>
	    </footer>
	</article>

	<hr>

	@include('comments.create')

	<div id="comments">
	    @include('comments.index')
    </div>
@stop

@section('scripts')
	<script>
		$("#commentForm").submit(function (event) {
			event.preventDefault();
			$.post($(this).attr('action'), $(this).serialize(), function (response) {
		        $("#comments").html(response.html);
			});
		})
	</script>
@stop
