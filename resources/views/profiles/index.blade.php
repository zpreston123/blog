@extends('layouts.master')

@section('title', 'Users')

@section('content')
	{{ Form::open(['route' => ['profiles.index'], 'method' => 'GET']) }}
		<div class="control has-icons-left">
			{{ Form::search('q', null,['class' => 'input is-medium', 'placeholder' => 'Search...']) }}
			<span class="icon is-left">
				<i class="fa fa-search"></i>
			</span>
		</div>
	{{ Form::close() }}

	<h1 class="title">All Results ({{ $users->count() }})</h1>

    <hr>

	<div class="box">
	@foreach ($users as $user)
		<article class="media">
			<div class="media-left">
				<figure class="image is-64x64">
					<img src="{{ $user->avatar }}">
				</figure>
			</div>
			<div class="media-content">
				<div class="content">
					<p>
						<a href="{{ route('profiles.show', $user->id) }}">
							<strong>{{ $user->name }}</strong>
						</a>
					</p>
				</div>
			</div>
		</article>
	@endforeach
	</div>
@endsection
