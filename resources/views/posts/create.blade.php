@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <div class="page-header">
      <h1>Create Post</h1>
    </div>

    {!! Form::open(['route' => 'posts.store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title here']) !!}
            {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category'), ['class' => 'form-control']) !!}
            {!! $errors->first('category', '<small class="text-danger">:message</small>') !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Content') !!}
            {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'placeholder' => 'Enter content here']) !!}
            {!! $errors->first('body', '<small class="text-danger">:message</small>') !!}
        </div>

        {!! Form::submit("Publish", ['class' => 'btn btn-success']) !!}
        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
    {!! Form::close() !!}
@endsection
