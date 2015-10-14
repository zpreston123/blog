<div class="panel panel-info" style="box-shadow: 0 0 15px gray;">
    <div class="panel-heading" style="color:white;">Login</div>
    <div class="panel-body">
        {!! Form::open(['url' => 'auth/login']) !!}
            <div class="form-group">
                {!! Form::text('email', old('email'), ['class' => 'form-control input-sm', 'placeholder' => 'Email']) !!}
                {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
            </div>

            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control input-sm', 'placeholder' => 'Password']) !!}
                {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label for="remember">
                        {!! Form::checkbox('remember', null, null, ['id' => 'remember']) !!} Remember me
                    </label>
                </div>
            </div>

            {!! Form::button('<i class="fa fa-sign-in"></i> Log in', ['class' => 'btn btn-sm btn-block btn-info', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
</div>
