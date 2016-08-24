<ul class="collection">
	@foreach ($post->comments as $comment)
	    <li class="collection-item avatar">
	     	<img src="/uploads/avatars/{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" class="circle">
	     	<span class="title">{{ $comment->user->name }}</span>
			<p>
				{{ $comment->body }}<br>
				{{ $comment->created_at->diffForHumans() }}
			</p>
			@if ((auth()->id() == $comment->user->id) || ($post->user->id == auth()->id()))
		     	<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a>
	     	@endif
	    </li>
	@endforeach
</ul>
