@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Register an Account</h1>

            <div class="box">
                {{ Form::open(['url' => 'register']) }}
                    <div class="field">
                        {{ Form::label('name', 'Name', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::text('name', old('name'), ['class' => 'input']) }}
                            <span class="icon is-small is-left">
                                @fa('user')
                            </span>
                        </div>
                        {!! $errors->first('name', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('email', 'Email', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::text('email', old('email'), ['class' => 'input']) }}
                            <span class="icon is-small is-left">
                                @fa('envelope')
                            </span>
                        </div>
                        {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('gender', 'Gender', ['class' => 'label']) }}
                        <div class="select">
                            {{ Form::select('gender', ['' => 'Select an option', 'male' => 'Male', 'female' => 'Female']) }}
                        </div>
                        {!! $errors->first('gender', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <hr>

                    <div class="field">
                        {{ Form::label('password', 'Password', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::password('password', ['class' => 'input']) }}
                            <span class="icon is-small is-left">
                                @fa('lock')
                            </span>
                        </div>
                        {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'label']) }}
                        <div class="control has-icons-left">
                            {{ Form::password('password_confirmation', ['class' => 'input']) }}
                            <span class="icon is-small is-left">
                                @fa('check-circle')
                            </span>
                        </div>
                    </div>

                    <div class="buttons">
                        <submit-button class="is-primary">Register</submit-button>
                        {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/"']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
