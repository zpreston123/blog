<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a href="{{ (auth()->check()) ? "/posts" : "/" }}" class="nav-item">EXPress Blog</a>
      @if (auth()->check())
        <a href="/posts/create" class="nav-item {{ Request::is('posts/create') ? 'is-active' : '' }}">New Post</a>
        <a href="/my_favorites" class="nav-item {{ Request::is('my_favorites') ? 'is-active' : '' }}">My Favorites</a>
        <div class="navbar-item">
          <form method="GET" action="/users/search">
              <div class="control has-icons-left">
                <input class="input is-small" type="text" name="q" placeholder="Search users...">
                <span class="icon is-small is-left">
                  <i class="fa fa-search"></i>
                </span>
              </div>
          </form>
        </div>
      @endif
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    @if (auth()->check())
      <div class="nav-right nav-menu">
        <a href="/profile/{{ auth()->id() }}" class="nav-item">
          <figure class="image is-16x16" style="margin-right: 8px;">
            <img src="{{ auth()->user()->avatar }}">
          </figure>
          {{ auth()->user()->name }}
        </a>
        <a href="/logout" class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
        <form action="/logout" id="logout-form" method="POST">
          {{ csrf_field() }}
        </form>
      </div>
    @endif
  </div>
</nav>
