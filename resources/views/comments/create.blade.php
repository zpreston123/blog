{!! Form::open(['method' => 'POST', 'route' => 'comments.store', 'class' => 'form-horizontal']) !!}
    {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'rows' => '1', 'placeholder' => 'Enter comment here...']) !!}
{!! Form::close() !!}
