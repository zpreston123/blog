@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h1 class="title has-text-centered">Edit Profile</h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                {!! Form::open(['route' => ['profile.update', $profile], 'enctype' => 'multipart/form-data', 'method' => 'PATCH']) !!}
                    {!! Form::label('avatar', 'Avatar', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::file('avatar') !!}               {!! $errors->first('avatar', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    {!! Form::label('name', 'Name', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::text('name', $profile->name, ['class' => 'input']) !!}
                        {!! $errors->first('name', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    {!! Form::label('email', 'Email', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::text('email', $profile->email, ['class' => 'input']) !!}
                        {!! $errors->first('email', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    {!! Form::label('password', 'New Password', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::password('password', ['class' => 'input']) !!}
                        {!! $errors->first('password', '<span class="help is-danger">:message</span>') !!}
                    </p>


                    {!! Form::label('password_confirm', 'Confirm New Password', ['class' => 'label']) !!}
                    <p class="control">
                        {!! Form::password('password_confirm', ['class' => 'input']) !!}
                        {!! $errors->first('password_confirm', '<span class="help is-danger">:message</span>') !!}
                    </p>

                    <p class="control">
                        {!! Form::submit('Update', ['class' => 'button is-primary']) !!}
                    </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
