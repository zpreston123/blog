<div class="card blue-grey darken-1">
    <div class="card-content white-text">
        {!! Form::open(['url' => 'login']) !!}
            <div class="input-field">
                {!! Form::text('email', old('email'), ['placeholder' => 'Email']) !!}
                {!! $errors->first('email', '<span class="red-text text-lighten-1">:message</span>') !!}
            </div>
            <div class="input-field">
                {!! Form::password('password', ['placeholder' => 'Password']) !!}
                {!! $errors->first('password', '<span class="red-text text-lighten-1">:message</span>') !!}
            </div><br>
            {!! Form::button('Log in', ['class' => 'btn btn-sm btn-block btn-info', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
</div>
