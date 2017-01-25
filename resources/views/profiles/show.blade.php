@extends('layouts.master')

@section('title', $profile->name)

@section('content')
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

            <a href="{{ url('profile/'.$profile->id.'/edit') }}" class="button is-primary is-outlined">Edit Profile</a>
          </p>
        </div>
      </div>
    </div>

    <hr>

	<div class="columns">
		@if (count($profile->posts) > 0)
			@foreach($profile->posts()->latest()->get() as $post)
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
		@else
			<div class="column">
				<p>You don't no posts created. Please click on New Post to create one.</p>
			</div>
		@endif
	</div>
@stop
