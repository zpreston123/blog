@extends('layouts.master')

@section('title', $post->title)

@section('content')
	<section class="section is-small" style="padding-top:0;">
		<div class="container">
			<h1 class="title">{{ $post->title }}</h1>
			<p class="subtitle">By: {{ $post->author->name }}</p>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="columns is-mobile">
				<div class="column is-8 is-offset-2">
					<div class="box content">
						<p class="has-text-right">published {{ $post->created_at->diffForHumans() }}</p>
						<p>{{ $post->body }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<hr>

	<section class="section">
	    <comments post-id="{{ $post->id }}"></comments>
	</section>
@stop
