@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sign Up
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'auth/register', 'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                </div>
                <div>
                    {!! Form::submit('Register', ['class' => 'btn btn-block btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
