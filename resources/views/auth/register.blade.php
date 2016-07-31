@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Sign Up</h2>
            <div class="row">
                {!! Form::open(['url' => 'register']) !!}
                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', old('name')) !!}
                            {!! $errors->first('name', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', old('email')) !!}
                            {!! $errors->first('email', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password') !!}
                            {!! $errors->first('password', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('password_confirmation', 'Confirm Password') !!}
                            {!! Form::password('password_confirmation') !!}
                            {!! $errors->first('password_confirmation', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::button('Register', ['class' => 'btn btn waves-effect waves-light', 'type' => 'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
