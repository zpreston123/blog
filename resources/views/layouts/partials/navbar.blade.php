<nav class="navbar is-danger" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<a class="navbar-item" href="{{ (auth()->check()) ? route('posts.index') : route('welcome') }}">Blog Xpress</a>
		@auth
			<div class="navbar-burger burger" data-target="navMenu">
				<span></span>
				<span></span>
				<span></span>
			</div>
		@endauth
	</div>
	@auth
		<div class="navbar-menu" id="navMenu">
			<div class="navbar-start">
				<a class="navbar-item" href="{{ route('posts.create') }}">New Post</a>
			</div>
			<div class="navbar-end">
				<a class="navbar-item" href="{{ route('profiles.index') }}">Find Users</a>
				{{-- <div class="navbar-item has-dropdown is-hoverable" id="markAsRead" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadNotifications) }}')">
					<a class="navbar-link">
						<span class="badge is-badge-info is-badge-small" data-badge="{{ count(auth()->user()->unreadNotifications) }}">
							<i class="fa fa-globe fa-lg"></i>
						</span>&nbsp;&nbsp;
					</a>
					<div class="navbar-dropdown is-right">
						@forelse(auth()->user()->unreadNotifications as $notification)
							@include('notifications.'.snake_case(class_basename($notification->type)))
						@empty
							<a href="#" class="navbar-item">No unread notifications.</a>
						@endforelse
					</div>
				</div> --}}
				<a class="navbar-item" href="{{ route('profiles.show', auth()->id()) }}">
					<figure class="image is-16x16" style="margin-right: 8px;">
						<img src="{{ auth()->user()->avatar }}">
					</figure>
					{{ auth()->user()->name }}
				</a>
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link" href="#">
						<i class="fas fa-user"></i>
					</a>
					<div class="navbar-dropdown is-right">
						<a class="navbar-item" href="{{ route('profiles.edit', auth()->id()) }}">Edit Profile</a>
						<a class="navbar-item" href="{{ route('logout') }}"
							onclick="
								event.preventDefault();
								document.getElementById('logout-form').submit();
							">
							Log out
						</a>
						{{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	@endauth
</nav>
