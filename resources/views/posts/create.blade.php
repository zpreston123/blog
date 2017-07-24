@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <h1 class="title has-text-centered">Create Post</h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <form method="POST" action="{{ route('posts.store') }}">
                    {{ csrf_field() }}

                    <label for="title" class="label">Title</label>
                    <p class="control">
                        <input type="text" name="title" value="{{ old('title') }}" class="input">
                        <span class="help is-danger">{{ $errors->first('title') }}</span>
                    </p>

                    <label for="category" class="label">Category</label>
                    <p class="control">
                        <span class="select">
                            {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category')) !!}
                        </span>
                        <span class="help is-danger">{{ $errors->first('category') }}</span>
                    </p>

                    <label for="tags" class="label">Tags</label>
                    <p class="control">
                        <span class="select is-multiple">
                            {!! Form::select('tags[]', $tags, old('tags'), ['id' => 'tags', 'multiple']) !!}
                        </span>
                    </p>

                    <label for="body" class="label">Content</label>
                    <p class="control">
                        <textarea name="body" value="{{ old('body') }}" class="textarea"></textarea>
                        <span class="help is-danger">{{ $errors->first('body') }}</span>
                    </p>

                    <p class="control">
                        <input type="submit" value="Publish" class="button is-primary">
                        <button class="button" onclick="document.location.href='/posts/'">Cancel</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
