@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Create Post</h2>
            <div class="row">
                {!! Form::open(['route' => 'posts.store', 'class' => 'col s12']) !!}
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::text('title', old('title')) !!}
                            {!! Form::label('title', 'Title') !!}
                            {!! $errors->first('title', '<small class="red-text">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('category', 'Category') !!}<br/>
                        </div>
                        <div class="input-field col s12">
                            {!! Form::select('category', ['' => 'Select an option'] + $categories, old('category'), ['class' => 'browser-default']) !!}
                            {!! $errors->first('category', '<small class="red-text">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::textarea('body', old('body'), ['class' => 'materialize-textarea']) !!}
                            {!! Form::label('body', 'Content') !!}
                            {!! $errors->first('body', '<small class="red-text">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Publish
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
