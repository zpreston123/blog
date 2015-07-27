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
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category'), ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('category') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Content') !!}
            {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'placeholder' => 'Enter content here']) !!}
            <small class="text-danger">{{ $errors->first('body') }}</small>
        </div>

        {!! Form::submit("Publish", ['class' => 'btn btn-success']) !!}
        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
    {!! Form::close() !!}
@endsection
