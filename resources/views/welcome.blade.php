@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="columns">
        <div class="column is-three-quarters">
            <h1>Welcome!</h1>
            <p>Express yourself any time and share it with your family and friends.</p>
            <p>Please log in or click below to register for an account:</p>
            <p>
                <a class="button is-medium is-primary" href="{{ url('register') }}">Sign Up</a>
            </p>
        </div>
        <div class="column">
            @include('auth.login')
        </div>
    </div>
@endsection
