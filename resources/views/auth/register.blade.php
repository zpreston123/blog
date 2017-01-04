@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns is-vcentered">
        <div class="column is-4 is-offset-4">
            <h1 class="title">
                Register an Account
            </h1>
            {!! Form::open(['url' => 'register']) !!}
                <div class="box">
                    {!! Form::label('name', 'Name', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::text('name', old('name'), ['class' => 'input', 'placeholder' => 'John Doe']) !!}
                        {!! $errors->first('name', '<span class="help is-danger">:message</span>') !!}
                    </p>
                    {!! Form::label('email', 'Email', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::text('email', old('email'), ['class' => 'input', 'placeholder' => 'jdoe@example.com']) !!}
                        {!! $errors->first('email', '<span class="help is-danger">:message</span>') !!}
                    </p>
                    <hr>
                    {!! Form::label('password', 'Password', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::password('password', ['class' => 'input', 'placeholder' => '*******']) !!}
                        {!! $errors->first('password', '<span class="help is-danger">:message</span>') !!}
                    </p>
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::password('password_confirmation', ['class' => 'input', 'placeholder' => '*******']) !!}
                        {!! $errors->first('password_confirmation', '<span class="help is-danger">:message</span>') !!}
                    </p>
                <p class="has-text-centered">
                    {!! Form::submit('Register', ['class' => 'button is-primary']) !!}
                </p>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
