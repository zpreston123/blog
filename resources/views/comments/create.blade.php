{!! Form::open(['url' => 'posts/{{ $post->id }}/comment', 'id' => 'commentForm']) !!}
	<legend>Add a Comment:</legend>
	<div class="input-field">
		<div class="form-group">
			{!! Form::text('body', null, ['class' => 'form-control', 'placeholder' => 'Body']) !!}
		</div>
	</div>
	{!! Form::submit('Submit', ['class' => 'btn']) !!}
{!! Form::close() !!}
