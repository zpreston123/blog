<nav class="nav has-shadow" id="top">
  <div class="container">
    <div class="nav-left">
      <a href="{{ (auth()->check()) ? "/posts" : "/" }}" class="nav-item">EXPress Blog</a>
    </div>

    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>

    @if (auth()->check())
      <div class="nav-right nav-menu">
        <a href="{{ url('posts/create') }}" class="nav-item {{ Request::is('posts/create') ? 'is-active' : '' }}">New Post</a>
        <a href="{{ url('logout') }}" class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <img src="{{ auth()->user()->avatar }}">{{ auth()->user()->name }}
        </a>
        {!! Form::open(['id' => 'logout-form', 'url' => 'logout']) !!}
        {!! Form::close() !!}
      </div>
    @endif
  </div>
</nav>
