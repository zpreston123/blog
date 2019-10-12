@extends('layouts.master')

@section('title', 'Confirm Password')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Confirm Password</h1>

            <div class="box">
                <p>
                    Please confirm your password before continuing.
                    We won't ask for your password again for a few hours.
                </p>

                {{ Form::open(['route' => 'password.confirm']) }}
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            {{ Form::label('password', 'Password', ['class' => 'label']) }}
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    {{ Form::password('password', ['class' => 'input' . ($errors->has('password') ? ' is-danger' : ''), 'autocomplete' => 'current-password']) }}
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label"></div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    {{ Form::submit('Confirm Password', ['class' => 'button is-primary']) }}

                                    @if (Route::has('password.request'))
                                        <a class="button is-text" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
