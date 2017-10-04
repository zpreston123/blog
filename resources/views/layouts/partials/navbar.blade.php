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
        {{ Form::open(['route' => ['profiles.index'], 'method' => 'GET']) }}
          <div class="control has-icons-left">
            {{ Form::search('q', null, ['class' => 'input is-small', 'placeholder' => 'Search users...']) }}
            <span class="icon is-left">
              <i class="fa fa-search"></i>
            </span>
          </div>
        {{ Form::close() }}
        <a class="navbar-item" href="/profiles/{{ auth()->id() }}">
          <figure class="image is-16x16" style="margin-right: 8px;">
            <img src="{{ auth()->user()->avatar }}">
          </figure>
          {{ auth()->user()->name }}
        </a>
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
  @endauth
</nav>
