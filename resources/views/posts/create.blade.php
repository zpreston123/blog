@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <h1 class="title has-text-centered">
        Create Post
    </h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                {{ Form::open(['route' => 'posts.store']) }}
                    @include('posts.form', ['submitButtonText' => 'Publish'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
