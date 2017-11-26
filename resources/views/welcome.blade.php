@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="columns">
        <div class="column is-three-quarters">
            <h1>Welcome to Blog Xpress!</h1>
            <image class="logo" src="/images/train-express.png"></span>
            <p>Express yourself any time and share it with your followers!</p>
            <p>Please log in or click below to register an account:</p>
            <p>
                <a class="button is-medium is-info" href="/register">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span>Sign up</span>
                </a>
            </p>
        </div>
        <div class="column">
            @include('auth.login')
        </div>
    </div>
@endsection
