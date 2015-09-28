{!! Form::open(['method' => 'POST', 'route' => 'comments.store', 'id' => 'commentsForm', 'class' => 'form-inline']) !!}
    {!! Form::hidden('post_id', base64_encode($post->id)) !!}
    {!! Form::textarea('body', old('body'), ['class' => 'form-control input-sm', 'rows' => '1', 'placeholder' => 'Enter comment here...']) !!}
    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
{!! Form::close() !!}<br>
