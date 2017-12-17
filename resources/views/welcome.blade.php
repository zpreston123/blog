@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="columns">
        <div class="column is-three-quarters">
            <h1 class="title" style="font-family: american typewriter, serif; font-size: 4rem;">Welcome to Blog Xpress!</h1>
            <img class="logo" src="/images/train-express.png">
            <h2 class="subtitle">Express yourself any time and share your thoughts or experiences with your followers!</h2>
            <p style="font-family: american typewriter, serif; font-size: 1.3rem;">
                Please log in or click below to register an account:
            </p>
            <p>
                <a class="button is-medium is-info" href="{{ route('register') }}">
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
