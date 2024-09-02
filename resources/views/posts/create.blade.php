@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <h1 class="title has-text-centered">
        Create Post
    </h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    @include('posts.form', ['submitButtonText' => 'Publish'])
                </form>
            </div>
        </div>
    </div>
@endsection
