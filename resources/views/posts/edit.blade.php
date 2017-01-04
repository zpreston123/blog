@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
    <h1 class="title">Edit Post</h1>

    <div class="columns">
        <div class="column is-half">
            <div class="box">
                {!! Form::model($post, ['url' => 'posts/'.$post->id, 'method' => 'PUT']) !!}
                    {!! Form::label('title', 'Title', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::text('title', $post->title, ['class' => 'input']) !!}
                        {!! $errors->first('title', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    {!! Form::label('category', 'Category', ['class' => 'label']) !!}
                    <p class="control">
                        <span class="select">
                            {!! Form::select('category', ['' => 'Select an option'] + $categories, $post->category->id) !!}
                        </span>
                        {!! $errors->first('category', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    {!! Form::label('body', 'Content', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::textarea('body', $post->body, ['class' => 'textarea']) !!}
                        {!! $errors->first('body', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    <p class="control">
                        <button class="button is-primary" type="submit">Update</button>
                    </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
