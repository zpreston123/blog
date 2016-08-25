<ul id="dropdown2" class="dropdown-content">
	<li><a href="{{ url('profile') }}">Profile</a></li>
	<li>
		{!! Form::open(['url' => 'logout']) !!}
      		{!! Form::submit('Logout', ['class' => 'logout']) !!}
		{!! Form::close() !!}
  	</li>
</ul>

<ul class="side-nav" id="mobile-demo">
	<li><a href="{{ url('posts/create') }}">New Post</a></li>
	<li>
	  <a class="dropdown-button" href="#!" data-activates="dropdown2" style="position:relative; padding-left:50px;">
	    <img src="/uploads/avatars/{{ auth()->user()->avatar }}" style="width:32px; height:32px; position:absolute; top:15px; left:10px; border-radius:50%;">
	    {{ auth()->user()->name }}<i class="material-icons right">arrow_drop_down</i>
	  </a>
	</li>
</ul>
