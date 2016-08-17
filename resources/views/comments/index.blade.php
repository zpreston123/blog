<ul class="collection">
	@foreach ($post->comments as $comment)
	    <li class="collection-item avatar">
	     	<img src="#" alt="" class="circle">
	     	<span class="title">{{ $comment->user->name }}</span>
			<p>
				{{ $comment->body }}<br>
				{{ $comment->created_at->diffForHumans() }}
			</p>
	     	<a href="#!" class="secondary-content"><i class="material-icons">delete</i></a>
	    </li>
	@endforeach
</ul>
