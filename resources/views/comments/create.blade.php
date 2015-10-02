{!! Form::open(['route' => 'comments.store', 'id' => 'commentsForm', 'class' => 'form-inline commentsForm']) !!}
    {!! Form::hidden('post_id', base64_encode($post->id), ['id' => 'post_id']) !!}
    {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control input-sm', 'rows' => '1', 'placeholder' => 'Enter comment here...']) !!}
    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
{!! Form::close() !!}<br>
