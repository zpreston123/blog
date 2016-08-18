@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <div class="row">
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ $user->name }}'s Profile</h2>
            </div>

            <div class="row">
                {!! Form::open(['url' => 'profile', 'enctype' => 'multipart/form-data', 'class' => 'col s12']) !!}
                    <div class="row">
                        <label>Profile Image</label>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Browse</span>
                                <input type="file" name="avatar">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Update Profile Image">
                            </div>
                            {!! $errors->first('avatar', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $user->name) !!}
                            {!! $errors->first('name', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $user->email) !!}
                            {!! $errors->first('email', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('password', 'New Password') !!}
                            {!! Form::password('password') !!}
                            {!! $errors->first('password', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('password_confirm', 'Confirm New Password') !!}
                            {!! Form::password('password_confirm') !!}
                            {!! $errors->first('password_confirm', '<span class="red-text">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
