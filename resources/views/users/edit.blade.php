@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h1>Edit Profile</h1>

    {!! Form::model($user, ['url' => 'profile/'.$user->id, 'method' => 'PUT']) !!}
        <div class="input-field">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $user->name) !!}
            {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="input-field">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $user->email) !!}
            {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="input-field">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password') !!}
            {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="input-field">
            {!! Form::label('password_confirm', 'Confirm New Password') !!}
            {!! Form::password('password_confirm') !!}
            {!! $errors->first('password_confirm', '<small class="text-danger">:message</small>') !!}
        </div>

        {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
