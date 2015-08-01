@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h2>{{ $user->name }}</h2>

    <hr>

    {!! Form::model($user, ['url' => 'profile/'.$user->id, 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirm', 'Confirm New Password') !!}
            {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
            {!! $errors->first('password_confirm', '<small class="text-danger">:message</small>') !!}
        </div>

        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit("Save Changes", ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
