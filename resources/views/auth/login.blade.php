<div class="row">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Login</span>
                {!! Form::open(['url' => 'auth/login']) !!}
                    <div class="input-field">
                        {!! Form::text('email', old('email'), ['placeholder' => 'Email']) !!}
                        {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="input-field">
                        {!! Form::password('password', ['placeholder' => 'Password']) !!}
                        {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="input-field">
                        <div class="checkbox">
                            <label for="remember">
                                {!! Form::checkbox('remember', null, null, ['id' => 'remember']) !!} Remember me
                            </label>
                        </div>
                    </div>

                    {!! Form::button('Log in', ['class' => 'btn btn-sm btn-block btn-info', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
