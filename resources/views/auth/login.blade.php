<div class="box">
    {{ Form::open(['route' => 'login']) }}
        <div class="field">
            <div class="control has-icons-left">
                {{ Form::text('email', old('email'), ['class' => 'input' . ($errors->has('email') ? ' is-danger' : ''), 'placeholder' => 'Email']) }}
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="field">
            <div class="control has-icons-left">
                {{ Form::password('password', ['class' => 'input' . ($errors->has('password') ? ' is-danger' : ''), 'placeholder' => 'Password']) }}
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    {{ Form::checkbox('remember', old('remember'), old('remember') ? true : false) }}
                    Remember me
                </label>
            </div>
        </div>

        <div class="control">
            {{ Form::button('
                <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
                <span>Log in</span>',
                [
                    'type' => 'submit',
                    'class' => 'button is-info is-fullwidth'
                ])
            }}
        </div>

        <div class="control has-text-centered">
            <a class="button is-small is-text" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    {{ Form::close() }}
</div>
