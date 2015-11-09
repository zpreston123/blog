@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
          <h1>Edit Profile</h1>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit Profile</div>
            <div class="panel-body">
                {!! Form::model($user, ['url' => 'profile/'.$user->id, 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $user->name, ['class' => 'input-sm form-control']) !!}
                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $user->email, ['class' => 'input-sm form-control']) !!}
                        {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'input-sm form-control']) !!}
                        {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirm', 'Confirm New Password') !!}
                        {!! Form::password('password_confirm', ['class' => 'input-sm form-control']) !!}
                        {!! $errors->first('password_confirm', '<small class="text-danger">:message</small>') !!}
                    </div>

                    {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
