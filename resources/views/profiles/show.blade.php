@extends('layouts.master')

@section('title', $profileUser->name)

@section('content')
	<div class="box">
		<div class="section profile-heading">
			<div class="columns">
				<div class="column is-2">
					<div class="image is-128x128 avatar">
						<img src="{{ $profileUser->avatar }}">
					</div>
				</div>
				<div class="column is-4 name">
					<p>
						<span class="title is-bold">{{ $profileUser->name }}</span><br>
						<span class="subtitle">
							{{ $profileUser->email }}<br><br>
							Created: {{ $profileUser->created_at->format('m/d/Y h:ma') }}<br>
							Updated: {{ $profileUser->updated_at->format('m/d/Y h:ma') }}
						</span><br><br>

						@if (auth()->id() !== $profileUser->id)
							@following($profileUser)
								{{ Form::open(['url' => 'unfollow/'.$profileUser->id, 'method' => 'DELETE']) }}
									{{ Form::submit('Unfollow', ['class' => 'button is-danger']) }}
								{{ Form::close() }}
							@else
								{{ Form::open(['url' => 'follow/'.$profileUser->id]) }}
									{{ Form::submit('Follow', ['class' => 'button is-success']) }}
								{{ Form::close() }}
							@endfollowing
						@else
							<a href="{{ route('profiles.edit', $profileUser->id) }}" class="button is-info">Edit Profile</a>
							<a href="/follow" class="button is-success">Following</a>
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>

	@includeWhen(auth()->id() === $profileUser->id, 'profiles.posts', compact('profileUser'))
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

