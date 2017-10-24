<div class="box">
    {{ Form::open(['url' => 'login']) }}
        <div class="field">
            <div class="control has-icons-left">
                {{ Form::text('email', old('email'), ['class' => 'input', 'placeholder' => 'Email']) }}
                <span class="icon is-small is-left">
                    @fa('envelope')
                </span>
            </div>
            {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="field">
            <div class="control has-icons-left">
                {{ Form::password('password', ['class' => 'input', 'placeholder' => 'Password']) }}
                <span class="icon is-small is-left">
                    @fa('lock')
                </span>
            </div>
            {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="control">
            <submit-button class="is-info is-fullwidth">
                <span class="icon">@fa('sign-in')</span>
                <span>Log in</span>
            </submit-button>
        </div>
    {{ Form::close() }}
</div>
