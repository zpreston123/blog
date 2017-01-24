{!! Form::open(['url' => 'login']) !!}
    {!! Form::label('email', 'Email', ['class' => 'label']) !!}
    <p class="control has-icon">
        {!! Form::text('email', old('email'), ['class' => 'input', 'placeholder' => 'jdoe@example.com']) !!}
        <span class="icon is-small">
            <i class="fa fa-envelope"></i>
        </span>
        {!! $errors->first('email', '<span class="help is-danger">:message</span>') !!}
    </p>
    {!! Form::label('password', 'Password', ['class' => 'label']) !!}
    <p class="control has-icon">
        {!! Form::password('password', ['class' => 'input', 'placeholder' => '*******']) !!}
        <span class="icon is-small">
            <i class="fa fa-lock"></i>
        </span>
        {!! $errors->first('password', '<span class="help is-danger">:message</span>') !!}
    </p>
    <p class="control">
        {!! Form::submit('Log in', ['class' => 'button is-primary']) !!}
    </p>
{!! Form::close() !!}
