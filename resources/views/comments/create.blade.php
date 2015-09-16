{!! Form::open(['method' => 'POST', 'route' => 'comments.store', 'class' => 'form-inline']) !!}
    {!! Form::textarea('body', old('body'), ['class' => 'form-control input-sm', 'rows' => '1', 'placeholder' => 'Enter comment here...']) !!}
    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
{!! Form::close() !!}<br>
