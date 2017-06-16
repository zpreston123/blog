@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Register an Account</h1>

            <div class="box">
                <form action="/register" method="POST">
                    {{ csrf_field() }}

                    <label for="name" class="label">Name</label>
                    <p class="control">
                        <input type="text" name="name" value="{{ old('name') }}" class="input">
                        <span class="help is-danger">{{ $errors->first('name') }}</span>
                    </p>

                    <label for="email" class="label">Email</label>
                    <p class="control">
                        <input type="text" name="email" value="{{ old('email') }}" class="input">
                        <span class="help is-danger">{{ $errors->first('email') }}</span>
                    </p>

                    <hr>

                    <label for="password" class="label">Password</label>
                    <p class="control">
                        <input type="password" name="password" class="input">
                        <span class="help is-danger">{{ $errors->first('password') }}</span>
                    </p>

                    <label for="password_confirmation" class="label">Confirm Password</label>
                    <p class="control">
                        <input type="password" name="password_confirmation" class="input">
                        <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
                    </p>

                    <p class="control">
                        <input type="submit" value="Register" class="button is-primary">
                        <input type="button" value="Cancel" onclick="document.location.href='/'" class="button is-danger">
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
