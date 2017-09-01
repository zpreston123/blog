<div class="box">
    {!! Form::open(['url' => 'login']) !!}
        <div class="field">
            <div class="control has-icons-left">
                {{ Form::text('email', old('email'), ['class' => 'input', 'placeholder' => 'Email']) }}
                <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="field">
            <div class="control has-icons-left">
                {{ Form::password('password', ['class' => 'input', 'placeholder' => 'Password']) }}
                <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                </span>
            </div>
            {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="control">
            {{ Form::button('
                <span class="icon">
                    <i class="fa fa-sign-in"></i>
                </span>
                <span>Log in</span>',
                [
                    'type' => 'submit',
                    'class' => 'button is-info is-fullwidth'
                ])
            }}
        </div>
    {!! Form::close() !!}
</div>
