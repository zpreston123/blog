{!! Form::open(['url' => 'login']) !!}
    {!! Form::label('email', 'Email', ['class' => 'label']) !!}
    <p class="control">
        {!! Form::text('email', old('email'), ['class' => 'input', 'placeholder' => 'jdoe@example.com']) !!}
        {!! $errors->first('email', '<span class="help is-danger">:message</span>') !!}
    </p>
    {!! Form::label('password', 'Password', ['class' => 'label']) !!}
    <p class="control">
        {!! Form::password('password', ['class' => 'input', 'placeholder' => '*******']) !!}
        {!! $errors->first('password', '<span class="help is-danger">:message</span>') !!}
    </p>
    <p class="control">
        {!! Form::submit('Log in', ['class' => 'button is-primary']) !!}
    </p>
{!! Form::close() !!}
