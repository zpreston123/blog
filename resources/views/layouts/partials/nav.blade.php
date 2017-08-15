<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a href="{{ (auth()->check()) ? '/posts' : '/' }}" class="nav-item">EXPress Blog</a>
      @auth
        <a href="/posts/create" class="nav-item">New Post</a>
        <a href="/my_favorites" class="nav-item">My Favorites</a>
      @endauth
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    @auth
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
    @endauth
  </div>
</nav>
