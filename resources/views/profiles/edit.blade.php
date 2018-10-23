@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h1 class="title has-text-centered">Edit Profile</h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                @include('profiles.avatar', compact('profile'))<br>

                {{ Form::model($profile, ['route' => ['profiles.update', $profile], 'method' => 'PATCH']) }}
                    <div class="field">
                        {{ Form::label('name', 'Name', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::text('name', null, ['class' => 'input' . ($errors->has('email') ? ' is-danger': '')]) }}
                        </div>
                        {!! $errors->first('name', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('email', 'Email', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::text('email', null, ['class' => 'input' . ($errors->has('email') ? ' is-danger': '')]) }}
                        </div>
                        {!! $errors->first('email', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('password', 'New Password', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::password('password', ['class' => 'input' . ($errors->has('password') ? ' is-danger': '')]) }}
                        </div>
                        {!! $errors->first('password', '<p class="help is-danger">:message</p>') !!}
                    </div>

                    <div class="field">
                        {{ Form::label('password_confirmation', 'Confirm New Password', ['class' => 'label']) }}
                        <div class="control">
                            {{ Form::password('password_confirmation', ['class' => 'input' . ($errors->has('password_confirmation') ? ' is-danger': '')]) }}
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
    <script>
        var file = document.getElementById("avatar");
        file.onchange = function () {
            if(file.files.length > 0)
            {
                document.getElementById('file-name').innerHTML = file.files[0].name;
            }
        };
    </script>
@endsection
