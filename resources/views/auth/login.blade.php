<div class="box">
    {{ html()->form('POST', route('login'))->open() }}
        <div class="field">
            <div class="control has-icons-left">
                {{ html()
                    ->text('email', old('email'))
                    ->class('input' . ($errors->has('email') ? ' is-danger' : ''))
                    ->placeholder('Email')
                }}
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            {{ html()
                ->p('email')
                ->text($errors->first('email'))
                ->class('help is-danger')
            }}
        </div>

        <div class="field">
            <div class="control has-icons-left">
                {{ html()
                    ->password('password')
                    ->class('input' . ($errors->has('password') ? ' is-danger' : ''))
                    ->placeholder('Password')
                }}
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            {{ html()
                ->p('password')
                ->text($errors->first('password'))
                ->class('help is-danger')
            }}
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    {{ html()->checkbox('remember', old('remember'), old('remember') ? true : false) }}
                    Remember me
                </label>
            </div>
        </div>

        <div class="control">
            {{ html()
                ->button('
                    <span class="icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    <span>Log in</span>',
                    'submit'
                )
                ->class('button is-info is-fullwidth')
            }}
        </div>

        <div class="control has-text-centered">
            {{ html()
                ->a(route('password.request'), 'Forgot Your Password?')
                ->class('button is-small is-text')
            }}
        </div>
    {{ html()->form()->close() }}
</div>
