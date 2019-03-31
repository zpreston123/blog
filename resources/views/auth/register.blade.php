@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Register an Account</h1>

            <div class="box">
                {{ Form::open(['route' => 'register']) }}
                    <div class="field">
                        {{ Form::label('name', 'Name', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::text('name', old('name'), ['class' => 'input' . ($errors->has('name') ? ' is-danger' : '')]) }}
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        {!! $errors->first('name', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('email', 'Email', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::text('email', old('email'), ['class' => 'input' . ($errors->has('email') ? ' is-danger' : '')]) }}
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label(null, 'Gender', ['class' => 'label']) }}

                        {{ Form::radio('gender', 'male', false, ['class' => 'is-checkradio', 'id' => 'male']) }}
                        {{ Form::label('male', 'Male') }}

                        {{ Form::radio('gender', 'female', false, ['class' => 'is-checkradio', 'id' => 'female']) }}
                        {{ Form::label('female', 'Female') }}

                        {!! $errors->first('gender', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <hr>

                    <div class="field">
                        {{ Form::label('password', 'Password', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::password('password', ['class' => 'input' . ($errors->has('password') ? ' is-danger' : '')]) }}
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::password('password_confirmation', ['class' => 'input' . ($errors->has('password_confirmation') ? ' is-danger' : '')]) }}
                            <span class="icon is-small is-left">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </div>
                    </div>

                    <div class="buttons">
                        {{ Form::submit('Register', ['class' => 'button is-primary']) }}
                        {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/"']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
