<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a href="{{ (auth()->check()) ? "/posts" : "/" }}" class="nav-item">EXPress Blog</a>
      @if (auth()->check())
        <a href="{{ url('posts/create') }}" class="nav-item is-tab {{ Request::is('posts/create') ? 'is-active' : '' }}">New Post</a>
        <a class="nav-item is-tab {{ Request::is('my_favorites') ? 'is-active' : '' }}" href="{{ url('my_favorites') }}">My Favorites</a>
      @endif
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    @if (auth()->check())
      <div class="nav-right nav-menu">
        <a class="nav-item is-tab" href="{{ url('profile/'.auth()->id()) }}">
          <figure class="image is-16x16" style="margin-right: 8px;">
            <img src="{{ auth()->user()->avatar }}">
          </figure>
          {{ auth()->user()->name }}
        </a>
        <a href="{{ url('logout') }}" class="nav-item is-tab" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
        {!! Form::open(['id' => 'logout-form', 'url' => 'logout']) !!}
        {!! Form::close() !!}
      </div>
    @endif
  </div>
</nav>
