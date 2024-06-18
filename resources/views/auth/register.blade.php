@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">
                Register an Account
            </h1>

            <form class="box" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="name" class="label">Name</label>
                    <div class="control has-icons-left">
                        <input type="text" id="name" name="name" class="input @error('name') is-danger @enderror" value="{{ old('name') }}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="email" class="label">Email</label>
                    <div class="control has-icons-left">
                        <input type="email" id="email" name="email" class="input @error('email') is-danger @enderror" value="{{ old('email') }}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Gender</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="gender" value="male" class="is-checkradio" {{ old('gender') == 'male' ? 'checked' : '' }}>
                            Male
                        </label>
                        <label class="radio">
                            <input type="radio" name="gender" value="female" class="is-checkradio" {{ old('gender') == 'female' ? 'checked' : '' }}>
                            Female
                        </label>
                    </div>
                    @error('gender')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <hr>

                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control has-icons-left">
                        <input type="password" id="password" name="password" class="input @error('password') is-danger @enderror">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation" class="label">Confirm Password</label>
                    <div class="control has-icons-left">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input @error('password_confirmation') is-danger @enderror">
                        <span class="icon is-small is-left">
                            <i class="fas fa-check-circle"></i>
                        </span>
                    </div>
                </div>

                <div class="buttons">
                    <input type="submit" class="button is-primary" value="Register">
                    <a href="{{ route('welcome') }}" class="button is-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
