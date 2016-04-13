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
                    <div class="input-field {{ ($errors->has('title')) ? 'has-error' : ''}}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title here']) !!}
                        {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="input-field {{ ($errors->has('category')) ? 'has-error' : ''}}">
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category'), ['class' => 'form-control']) !!}
                        {!! $errors->first('category', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="input-field {{ ($errors->has('tags')) ? 'has-error' : ''}}">
                        {!! Form::label('tags', 'Tags') !!}
                        {!! Form::select('tags', [], old('tags'), ['class' => 'form-control', 'style' => 'width:100%;', 'multiple']) !!}
                        {!! $errors->first('tags', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="input-field">
                        {!! Form::label('body', 'Content') !!}
                        {!! Form::textarea('body', old('body'), ['id' => 'body', 'class' => 'materialize-textarea', 'placeholder' => 'Enter content here']) !!}
                        {!! $errors->first('body', '<small class="text-danger">:message</small>') !!}
                    </div>

                    {!! Form::submit("Publish", ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $("#tags").select2({
                tags: "true",
                placeholder: "Select a tag",
                theme: "bootstrap"
            });
        });
    </script>
@endsection
