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
				<div class="column is-4">
					<p>
						<span class="title is-bold">
							{{ $profile->name }}
						</span><br>
						<span class="subtitle">
							{{ $profile->email }}
						</span><br><br>

						@if (auth()->id() !== $profile->id)
							<follow-button :profile="{{ $profile }}"></follow-button>
						@endif
					</p>
				</div>
			</div>

			<hr>

			<nav class="level">
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">
							Posts
						</p>
						<p class="title">
							{{ $profile->posts_count }}
						</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">
							Followers
						</p>
						<p class="title">
							{{ $profile->followers_count }}
						</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">
							Following
						</p>
						<p class="title">
							{{ $profile->followings_count }}
						</p>
					</div>
				</div>
			</nav>
		</div>
	</div>

	@includeWhen(auth()->id() === $profile->id, 'profiles.posts', compact('profile'))
@endsection

@section('scripts')
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const deleteButton = document.getElementById('delete-button');
            if (deleteButton) {
    			deleteButton.addEventListener('click', event => {
    				event.preventDefault();
    				if (confirm('Are you sure you want to delete this post?')) {
    					document.getElementById('delete-form').submit();
    				}
    			});
            }
		});
	</script>
@endsection
