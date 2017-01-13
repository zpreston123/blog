@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Register an Account</h1>

            <div class="box">
                {!! Form::open(['url' => 'register']) !!}
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

                    <p class="control">
                        {!! Form::submit('Register', ['class' => 'button is-primary']) !!}
                        {!! Form::button('Cancel', ['class' => 'button', 'onclick' => 'document.location.href="/"']) !!}
                    </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
