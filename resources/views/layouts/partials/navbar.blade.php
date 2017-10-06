<nav class="navbar is-danger" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<a class="navbar-item" href="{{ (auth()->check()) ? '/posts' : '/' }}">Blog Xpress</a>
		<div
			id="burger"
			class="navbar-burger burger"
			onclick="toggleBurger()">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	@auth
		<div id="navMenu" class="navbar-menu">
			<div class="navbar-start">
				<a class="navbar-item" href="/posts/create">New Post</a>
				<a class="navbar-item" href="/favorites">My Favorites</a>
			</div>
			<div class="navbar-end">
				<a class="navbar-item" href="/profiles">Find Users</a>
				<div class="navbar-item has-dropdown is-hoverable" id="markAsRead" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadNotifications) }}')">
					<a class="navbar-link">
						<span class="badge is-badge-info is-badge-small" data-badge="{{ count(auth()->user()->unreadNotifications) }}">
							@fa('globe fa-lg')
						</span>&nbsp;&nbsp;
					</a>
					<div class="navbar-dropdown is-right">
						@forelse(auth()->user()->unreadNotifications as $notification)
							@include('notifications.'.snake_case(class_basename($notification->type)))
						@empty
							<a href="#" class="navbar-item">No unread notifications.</a>
						@endforelse
					</div>
				</div>
				<a class="navbar-item" href="/profiles/{{ auth()->id() }}">
					<figure class="image is-16x16" style="margin-right: 8px;">
						<img src="{{ auth()->user()->avatar }}">
					</figure>
					{{ auth()->user()->name }}
				</a>
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link" href="#">
						@fa('user')
					</a>
					<div class="navbar-dropdown is-right">
						<a class="navbar-item" href="/profiles/{{ auth()->id() }}/edit">Edit Profile</a>
						<a class="navbar-item"
							href="/logout"
							onclick="
								event.preventDefault();
								document.getElementById('logout-form').submit();
							">
							Log out
						</a>
						{{ Form::open(['url' => 'logout', 'id' => 'logout-form']) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	@endauth
</nav>
