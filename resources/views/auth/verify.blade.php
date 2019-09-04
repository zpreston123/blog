@extends('layouts.master')

@section('title', 'Verify Email')

@section('content')
     <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title has-text-centered">Verify Your Email Address</h1>

            <div class="box">
                @if (session('resent'))
                    <div class="notification is-success">
                        <button class="delete"></button>
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif

                Before proceeding, please check your email for a verification link.<br>
                If you did not receive the email,
                <form class="is-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="button is-link">click here to request another</button>.
                </form>
            </div>
        </div>
    </div>
@endsection
