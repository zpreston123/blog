@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h1 class="title has-text-centered">Edit Profile</h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <!-- Edit Avatar Form -->
                {{ Form::model($profileUser, ['route' => ['profiles.update-avatar', $profileUser], 'enctype' => 'multipart/form-data', 'method' => 'PUT']) }}
                    <div class="field is-grouped">
                        {{ Form::label('avatar', 'Avatar', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::file('avatar') }}
                        </div>
                        {!! $errors->first('avatar', '<p class="help is-danger">:message</p>') !!}
                        <div class="control">
                            {{ Form::submit('Update', ['class' => 'button is-info is-small']) }}
                        </div>
                    </div>
                {{ Form::close() }}

                <!-- Edit Profile Form -->
                {{ Form::model($profileUser, ['route' => ['profiles.update', $profileUser], 'method' => 'PATCH']) }}
                    <div class="field">
                        {{ Form::label('name', 'Name', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::text('name', null, ['class' => 'input']) }}
                        </div>
                        {!! $errors->first('name', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('email', 'Email', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::text('email', null, ['class' => 'input']) }}
                        </div>
                        {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('password', 'New Password', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::password('password', ['class' => 'input']) }}
                        </div>
                        {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('password_confirmation', 'Confirm New Password', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::password('password_confirmation', ['class' => 'input']) }}
                        </div>
                        {!! $errors->first('password_confirm', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            {{ Form::submit('Update', ['class' => 'button is-primary']) }}
                        </div>
                        <div class="control">
                            {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/posts"']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
