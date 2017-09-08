@extends('layouts.master')

@section('title', $profile->name)

@section('content')
	<div class="box">
		<div class="section profile-heading">
			<div class="columns">
				<div class="column is-2">
					<div class="image is-128x128 avatar">
						<img src="{{ $profile->avatar }}">
					</div>
				</div>
				<div class="column is-4 name">
					<p>
						<span class="title is-bold">{{ $profile->name }}</span><br>
						<span class="subtitle">
							{{ $profile->email }}<br><br>
							Created: {{ $profile->created_at->format('m/d/Y h:ma') }}<br>
							Updated: {{ $profile->updated_at->format('m/d/Y h:ma') }}
						</span><br><br>

						@if (auth()->user()->name != $profile->name)
							@if (auth()->user()->isFollowing($profile))
								{{ Form::open(['url' => 'unfollow/'.$profile->id, 'method' => 'DELETE']) }}
									{{ Form::submit('Unfollow', ['class' => 'button is-danger']) }}
								{{ Form::close() }}
							@else
								{{ Form::open(['url' => 'follow/'.$profile->id]) }}
									{{ Form::submit('Follow', ['class' => 'button is-success']) }}
								{{ Form::close() }}
							@endif
						@else
							<a href="{{ route('profiles.edit', $profile->id) }}" class="button is-info">Edit Profile</a>
							<a href="/follow" class="button is-success">Following</a>
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>

	@if (auth()->user()->name == $profile->name)
	    <hr>
		<h3>My Posts:</h3>
		@if (count($profile->posts) > 0)
			@foreach($profile->posts->sortByDesc('updated_at')->chunk(3) as $posts)
				<div class="columns">
					@foreach($posts as $post)
						<div class="column is-4">
							<div class="card">
								<header class="card-header">
									<p class="card-header-title">
										{{ $post->title }}
									</p>
								</header>
								<div class="card-content">
									<div class="content">
									    <p>
									    	{{ str_limit($post->body, 80) }}<br>
											<small>Created: {{ $post->created_at->diffForHumans() }}</small> |
											<small>Updated: {{ $post->updated_at->diffForHumans() }}</small>
										</p>
									</div>
								</div>
								<footer class="card-footer">
									<a class="card-footer-item" href="{{ route('posts.edit', ['post' => $post]) }}">Edit</a>
									<a class="card-footer-item" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete
										{{ Form::open(['route' => ['posts.destroy', $post], 'id' => 'delete-form', 'method' => 'delete']) }}
				                        {{ Form::close() }}
									</a>
								</footer>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		@endif
	@endif
@endsection

@section('scripts')
	<script>
		$(function () {
			$('#delete-button').click(function (event) {
				event.preventDefault();
				if (confirm('Are you sure you want to delete this post?')) {
					$('#delete-form').submit();
				}
			});
		});
	</script>
@endsection

