@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="columns">
        <div class="column is-three-quarters">
            <h1>Welcome to Express Blog!</h1>
            <image class="logo" src="/images/train-express.png"></span>
            <p>Express yourself any time and share it with your followers!</p>
            <p>Please log in or click below to register for an account:</p>
            <p>
                <a class="button is-medium is-primary" href="/register">Sign up</a>
            </p>
        </div>
        <div class="column">
            @include('auth.login')
        </div>
    </div>
@endsection
