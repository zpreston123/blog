
<div class="box">
    @if (session('confirmation'))
        <article class="message is-info">
            <div class="message-body">
                {{ session('confirmation') }}
            </div>
        </article>
    @endif

    {{ Form::open(['route' => 'login']) }}
        <div class="field">
            <div class="control has-icons-left">
                {{ Form::text('email', old('email'), ['class' => 'input', 'placeholder' => 'Email']) }}
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="field">
            <div class="control has-icons-left">
                {{ Form::password('password', ['class' => 'input', 'placeholder' => 'Password']) }}
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
        </div>

        <div class="control">
            <submit-button class="is-info is-fullwidth">
                <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
                <span>Log in</span>
            </submit-button>
        </div>
    {{ Form::close() }}
</div>
