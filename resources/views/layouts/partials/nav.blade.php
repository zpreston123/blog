<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="{{ url('profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
  <li><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
</ul>

<nav class="light-blue lighten-1">
  <div class="nav-wrapper">
    <a class="brand-logo" href="{{ (auth()->check()) ? "/posts" : "/" }}">EXPress Blog</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      @if (auth()->check())
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ url('posts/create') }}">New Post</a></li>
          <li>
            <form action="/users/search" method="GET">
              <div class="input-field">
                <input id="query" name="query" type="search">
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
            </form>
          </li>
          <!-- Dropdown Trigger -->
          <li>
            <a class="dropdown-button" href="#!" data-activates="dropdown1" style="position:relative; padding-left:50px;">
              <img src="/uploads/avatars/{{ auth()->user()->avatar }}" style="width:32px; height:32px; position:absolute; top:15px; left:10px; border-radius:50%;">
              {{ auth()->user()->name }}<i class="material-icons right">arrow_drop_down</i>
            </a>
          </li>
        </ul>
       <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      @endif
  </div>
</nav>
