@extends('layouts.master')

@section('title', 'Followers')

@section('content')
	<h1 class="title">Followers</h1>

	<hr>

	<div class="box">
		@forelse ($followers as $follower)
			<article class="media">
				<figure class="media-left">
					<p class="image is-64x64">
						<img src="{{ $follower->avatar }}">
					</p>
				</figure>
				<div class="media-content">
					<div class="content">
						<p>
							<a href="/profile/{{ $follower->id }}">
								<strong>{{ $follower->name }}</strong>
							</a><br>
							<small>{{ $follower->email }}</small>
						</p>
					</div>
				</div>
			</article>
		@empty
			<p>You have no followers.</p>
		@endforelse
	</div>
@endsection
