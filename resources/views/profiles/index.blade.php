@extends('layouts.master')

@section('title', 'Users')

@section('content')
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
						<a href="profiles/{{ $user->id }}">
							<strong>{{ $user->name }}</strong>
						</a>
					</p>
				</div>
			</div>
		</article>
	@endforeach
	</div>
@endsection
