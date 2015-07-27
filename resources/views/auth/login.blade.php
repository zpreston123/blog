<div class="panel panel-default" style="box-shadow: 0 0 15px gray;">
    <div class="panel-heading">Login</div>
    <div class="panel-body">
        {!! Form::open(['url' => 'auth/login']) !!}
            <div class="form-group">
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label for="remember">
                        {!! Form::checkbox('remember', null, null, ['id' => 'remember']) !!} Remember me
                    </label>
                </div>
            </div>
            {!! Form::submit('Log in', ['class' => 'btn btn-block btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
