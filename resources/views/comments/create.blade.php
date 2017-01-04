<article class="media">
	<figure class="media-left">
		<p class="image is-64x64">
			<img class="avatar" src="{{ auth()->user()->avatar }}">
		</p>
	</figure>
	<div class="media-content">
		<form action="/comments/{{ $post->id }}">
			<p class="control">
				<textarea class="textarea" placeholder="Add a comment..."></textarea>
			</p>
			<p class="control">
				<button class="button is-info">Post comment</button>
			</p>
		</form>
	</div>
</article>
