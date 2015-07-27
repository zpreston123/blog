@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h2>{{ $user->name }}</h2>
    <hr>
    {!! Form::open(['url' => 'profile/'.$user->id]) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirm', 'Confirm New Password') !!}
            {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('password_confirm') }}</small>
        </div>

        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit("Save Changes", ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection
