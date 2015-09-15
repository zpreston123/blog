@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header text-center">
          <h1>Create Post</h1>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create Post</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group {{ ($errors->has('title')) ? 'has-error' : ''}}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title here']) !!}
                        {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group {{ ($errors->has('category')) ? 'has-error' : ''}}">
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category'), ['class' => 'form-control']) !!}
                        {!! $errors->first('category', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Content') !!}
                        {!! Form::textarea('body', old('body'), ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Enter content here']) !!}
                        {!! $errors->first('body', '<small class="text-danger">:message</small>') !!}
                    </div>

                    {!! Form::submit("Publish", ['class' => 'btn btn-success']) !!}
                    {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! HTML::script('ckeditor/ckeditor.js') !!}
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
