<div class="box">
    {!! Form::open(['url' => 'login']) !!}
        <div class="field">
            {{ Form::label('email', 'Email', ['class' => 'label']) }}
            <div class="control has-icons-left">
                {{ Form::text('email', old('email'), ['class' => 'input']) }}
                <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="field">
            {{ Form::label('password', 'Password', ['class' => 'label']) }}
            <div class="control has-icons-left">
                {{ Form::password('password', ['class' => 'input']) }}
                <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                </span>
            </div>
            {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="control">
            {{ Form::submit('Log in', ['class' => 'button is-primary']) }}
        </div>
    {!! Form::close() !!}
</div>
