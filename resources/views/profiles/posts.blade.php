<hr>
<h3>
	My Posts:
</h3>
@if (count($profile->posts) > 0)
	@foreach($profile->posts->sortByDesc('updated_at')->chunk(3) as $posts)
		<div class="columns">
			@each('profiles.post', $posts, 'post')
		</div>
	@endforeach
@else
	<p>
		You have no posts created.
	</p>
@endif
