@extends('layouts.master')

@section('title', 'Show Post')

@section('content')
    <h1>{{ $post->title }}</h1>
    <h3>
        <small><i class="fa fa-user"></i> {{ $post->user->name }}</small>&nbsp;
        <small><i class="fa fa-calendar"></i> Published {{ $post->created_at->diffForHumans() }}</small>
    </h3>

    <p>{{ strip_tags($post->body) }}</p>

	<hr>

	<form id="commentForm" action="/posts/{{ $post->id }}/comment" method="post">
		{{ csrf_field() }}

		<legend>Add a Comment:</legend>
		<div class="input-field">
			<div class="form-group">
				<input type="text" class="form-control" name="body" placeholder="Body">
			</div>
		</div>
		<button id="submit" class="btn">Submit</button>
	</form>
	<div id="comments">
	    @include('comments.index')
    </div>
@stop

@section('scripts')
	<script>
		$("#commentForm").submit(function (event) {
			event.preventDefault();
			$.post($(this).attr('action'), $(this).serialize(), function (response) {
				// swal({ title: response.msg, type: 'success'});
		        $("#comments").html(response.html);
			});
		})
	</script>
@stop
