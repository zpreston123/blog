@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Register an Account</h1>

            <div class="box">
                <form method="POST" action="/register">
                    {{ csrf_field() }}

                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="name" value="{{ old('name') }}">
                            <span class="icon is-small is-left">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <p class="help is-danger">
                            {{ $errors->first('name') }}
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left">
                            <input class="input" type="text" name="email" value="{{ old('email') }}">
                            <span class="icon is-small is-left">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <p class="help is-danger">
                            {{ $errors->first('email') }}
                        </p>
                    </div>

                    <hr>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password">
                            <span class="icon is-small is-left">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">Confirm Password</label>
                        <div class="control has-icons-left">
                            <input class="input" type="password" name="password_confirmation">
                             <span class="icon is-small is-left">
                                <i class="fa fa-check-circle"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <p class="control">
                            <button class="button is-primary" type="submit">Register</button>
                        </p>
                        <p class="control">
                            <button class="button is-danger" onclick="document.location.href='/'">Cancel</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
