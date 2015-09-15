{!! Form::open(['method' => 'POST', 'route' => 'routeName', 'class' => 'form-horizontal']) !!}
    {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'placeholder' => 'Enter comment here...']) !!}
{!! Form::close() !!}
