<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" @if(auth()->check()) href="/posts" @else href="/" @endif>EXPress Blog</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      @if (auth()->check())
        <ul class="nav navbar-nav">
          <li><a href="{{ url('posts/create') }}">New Post</a></li>
          <li class="dropdown">@include('layouts.partials.notifications')</li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ url('profile/'.auth()->id().'/edit') }}"><i class="fa fa-user"></i> Edit Profile</a></li>
              <li><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
        <form action="/users/search" class="navbar-form navbar-right" method="get">
          <div class="input-group">
              <input type="text" name="query" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
              </span>
          </div>
        </form>
      @endif
    </div><!--/.navbar-collapse -->
  </div>
</nav>
