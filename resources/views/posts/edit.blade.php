@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
    <h1 class="title has-text-centered">Edit Post</h1>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                {{ Form::model($post, ['route' => ['posts.update', $post], 'method' => 'PUT']) }}
                    @include('posts.form', ['submitButtonText' => 'Update'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
