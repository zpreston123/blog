<ul class="collection">
	@foreach ($post->comments as $comment)
	    <li class="collection-item avatar">
	     	<img src="/uploads/avatars/{{ $comment->author->avatar }}" alt="{{ $comment->author->name }}" class="circle">
	     	<span class="title">{{ $comment->author->name }}</span>
			<p>
				{{ $comment->body }}<br>
				{{ $comment->created_at->diffForHumans() }}
			</p>
			@if ((auth()->id() == $comment->author->id) || ($post->author->id == auth()->id()))
		     	<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a>
	     	@endif
	    </li>
	@endforeach
</ul>
