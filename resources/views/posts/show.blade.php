@extends('layouts.master')

@section('title', $post->title)

@section('content')
	<section class="section" style="padding-top:0;">
		<h1 class="title">{{ $post->title }}</h1>
		<h5 class="subtitle">By: {{ $post->author->name }}</h5>
		<div class="box">
			<p class="has-text-right">published {{ $post->created_at->diffForHumans() }}</p>
			<p>{{ $post->body }}</p>
		</div>
	</section>

	<section class="section">
	    <comment-list post-id="{{ $post->id }}"></comment-list>
	</section>
@stop
