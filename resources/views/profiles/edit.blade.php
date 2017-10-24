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
                        <div class="file is-small has-name">
                            <label class="file-label">
                                {{ Form::file('avatar', ['class' => 'file-input', 'id' => 'avatar']) }}
                                <span class="file-cta">
                                    <span class="file-icon">
                                        @fa('upload')
                                    </span>
                                    <span class="file-label">
                                        Upload avatar...
                                    </span>
                                </span>
                                <span id="file-name" class="file-name">
                                    Screen Shot 2017-07-29 at 15.54.25.png
                                </span>
                            </label>
                        </div>
                        <div class="control">
                            <submit-button class="is-info is-small">Save</submit-button>
                        </div>
                    </div>
                    {!! $errors->first('avatar', '<p class="help is-danger">:message</p>') !!}
                {{ Form::close() }}<br>

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
                            <submit-button class="is-primary">Update</submit-button>
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

@section('scripts')
    @script
        var file = document.getElementById("avatar");
        file.onchange = function () {
            if(file.files.length > 0)
            {
                document.getElementById('file-name').innerHTML = file.files[0].name;
            }
        };
    @endscript
@endsection
