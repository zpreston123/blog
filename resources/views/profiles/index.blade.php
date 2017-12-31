@extends('layouts.master')

@section('title', 'Profiles')

@section('content')
	{{ Form::open(['route' => ['profiles.index'], 'method' => 'GET']) }}
		<div class="control has-icons-left">
			{{ Form::search('q', null,['class' => 'input is-medium', 'placeholder' => 'Search...']) }}
			<span class="icon is-left">
				<i class="fa fa-search"></i>
			</span>
		</div>
	{{ Form::close() }}

	<h1 class="title">All Results ({{ $profiles->count() }})</h1>

    <hr>

	<div class="box">
	@foreach ($profiles as $profile)
		<article class="media">
			<div class="media-left">
				<figure class="image is-64x64">
					<img src="{{ $profile->avatar }}">
				</figure>
			</div>
			<div class="media-content">
				<div class="content">
					<p>
						<a href="{{ route('profiles.show', $profile->id) }}">
							<strong>{{ $profile->name }}</strong>
						</a>
					</p>
				</div>
			</div>
		</article>
	@endforeach
	</div>
@endsection
