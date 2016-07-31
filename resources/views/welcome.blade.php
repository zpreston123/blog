@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col l7">
            <h1>Welcome!</h1>
            <p>Express yourself any time and share it with your family and friends.</p>
            <p>Please log in or click below to register for an account:</p>
            <p>
                <a class="waves-effect waves-light btn btn-large" href="{{ url('register') }}" role="button">Sign Up</a>
            </p>
        </div>
        <div class="col l5">
            @include('auth.login')
        </div>
    </div>
@endsection
