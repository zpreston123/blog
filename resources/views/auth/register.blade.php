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
                    {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    {!! $errors->first('password_confirmation', '<small class="text-danger">:message</small>') !!}
                </div>

                {!! Form::submit('Register', ['class' => 'btn btn-block btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
