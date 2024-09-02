@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
    <h1 class="title has-text-centered">
        Edit Post
    </h1>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @include('posts.form', ['submitButtonText' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
