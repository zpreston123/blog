<nav class="navbar">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ (auth()->check()) ? '/posts' : '/' }}">EXPress Blog</a>
    <div class="navbar-burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  @auth
    <div class="navbar-menu" id="navMenu">
      <div class="navbar-start">
        <a class="navbar-item" href="/posts/create">New Post</a>
        <a class="navbar-item" href="/my_favorites">My Favorites</a>
      </div>
      <div class="navbar-end">
        {{ Form::open(['url' => 'users/search', 'style' => 'padding-top: 8px;', 'method' => 'GET']) }}
          <div class="control has-icons-left">
            {{ Form::search('q', null, ['class' => 'input', 'placeholder' => 'Search users...']) }}
            <span class="icon is-left">
              <i class="fa fa-search"></i>
            </span>
          </div>
        {{ Form::close() }}
        <a class="navbar-item" href="/profile/{{ auth()->id() }}">
          <figure class="image is-16x16" style="margin-right: 8px;">
            <img src="{{ auth()->user()->avatar }}">
          </figure>
          {{ auth()->user()->name }}
        </a>
        <a class="navbar-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
        <form action="/logout" id="logout-form" method="POST">
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  @endauth
</nav>
