@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header text-center">
          <h1>Edit Post</h1>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Post</h3>
            </div>
            <div class="panel-body">
                {!! Form::model($post, ['url' => 'posts/'.$post->id, 'method' => 'PUT']) !!}
                    <div class="form-group {{ ($errors->has('title')) ? 'has-error' : ''}}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Enter title here']) !!}
                        {!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group {{ ($errors->has('category')) ? 'has-error' : ''}}">
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::select('category', ['' => 'Select an option'] + $categories, $post->category->id, ['class' => 'form-control']) !!}
                        {!! $errors->first('category', '<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Content') !!}
                        {!! Form::textarea('body', $post->body, ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Enter content here']) !!}
                        {!! $errors->first('body', '<small class="text-danger">:message</small>') !!}
                    </div>

                    {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
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
