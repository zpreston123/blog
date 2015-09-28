@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="jumbotron">
        <div class="col-md-8 col-xs-12 pull-left">
            <h1>Welcome!</h1>
            <p>Express yourself any time and share it with your family and friends.</p>
            <p>Please log in or click below to register for an account:</p>
            <p>
                <a class="btn btn-lg btn-primary" href="{{ url('/auth/register') }}" role="button">Sign Up</a>
            </p>
        </div>
        <div class="col-md-4 col-xs-12 pull-right">
            @include('auth.login')
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
