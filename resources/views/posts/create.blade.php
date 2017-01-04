@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <h1 class="title">Create Post</h2>

    <div class="columns">
        <div class="column is-half">
            <div class="box">
                {!! Form::open(['route' => 'posts.store']) !!}
                    {!! Form::label('title', 'Title', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::text('title', old('title'), ['class' => 'input']) !!}
                        {!! $errors->first('title', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    {!! Form::label('category', 'Category', ['class' => 'label']) !!}
                    <p class="control">
                        <span class="select">
                        {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category')) !!}
                        </span>
                        {!! $errors->first('category', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    <p class="control">
                        {!! Form::label('body', 'Content', ['class' => 'label']) !!}
                        {!! Form::textarea('body', old('body'), ['class' => 'textarea']) !!}
                        {!! $errors->first('body', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    <p class="control">
                        <button class="button is-primary" type="submit">Publish</button>
                    </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
