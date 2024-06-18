@extends('layouts.master')

@section('title', 'Confirm Password')

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">
                Confirm Password
            </h1>

            <div class="box">
                <p>
                    Please confirm your password before continuing.
                    We won't ask for your password again for a few hours.
                </p>

                <form action="{{ route('password.confirm') }}" method="POST">
                    @csrf

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label for="password" class="label">Password</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input type="password" class="input @error('password') is-danger @enderror" autocomplete="current-password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label"></div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="submit" class="button is-primary" value="Confirm Password">

                                    @if (Route::has('password.request'))
                                        <a class="button is-text" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
