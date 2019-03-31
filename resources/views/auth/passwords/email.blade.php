@extends('layouts.master')

@section('title', 'Reset Password')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Reset Password</h1>

            <div class="box">
                @if (session('status'))
                    <div class="notification is-success">
                        <button class="delete"></button>
                        {{ session('status') }}
                    </div>
                @endif

                {{ Form::open(['route' => 'password.email']) }}
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

                    <div class="buttons">
                        {{ Form::submit('Send Password Reset Link', ['class' => 'button is-primary']) }}
                        {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/"']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
