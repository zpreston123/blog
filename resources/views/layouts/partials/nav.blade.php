<ul id="dropdown1" class="dropdown-content">
  <li><a href="{{ url('profile') }}">Profile</a></li>
  <li><a href="{{ url('logout') }}">Logout</a></li>
</ul>

<nav class="light-blue lighten-1">
  <div class="nav-wrapper">
    <a class="brand-logo" href="{{ (auth()->check()) ? "/posts" : "/" }}">EXPress Blog</a>
    @if (auth()->check())
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('posts/create') }}">New Post</a></li>
        <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1" style="position:relative; padding-left:50px;">
            <img src="/uploads/avatars/{{ auth()->user()->avatar }}" style="width:32px; height:32px; position:absolute; top:15px; left:10px; border-radius:50%;">
            {{ auth()->user()->name }}<i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
      </ul>
      @include('layouts.partials.side-nav')
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    @endif
  </div>
</nav>
