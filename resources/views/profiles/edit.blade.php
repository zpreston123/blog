@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <h1 class="title has-text-centered">
        Edit Profile
    </h2>

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                @include('profiles.avatar', compact('profile'))<br>

                <form action="{{ route('profiles.update', $profile) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <div class="control">
                            <input type="text" id="name" name="name" class="input @error('name') is-danger @enderror" value="{{ old('name', $profile->name) }}">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <div class="control">
                            <input type="text" id="email" name="email" class="input @error('email') is-danger @enderror" value="{{ old('email', $profile->email) }}">
                        </div>
                        @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password" class="label">New Password</label>
                        <div class="control">
                            <input type="password" id="password" name="password" class="input @error('password') is-danger @enderror">
                        </div>
                        @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password_confirmation" class="label">Confirm New Password</label>
                        <div class="control">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="input @error('password_confirmation') is-danger @enderror">
                        </div>
                        @error('password_confirmation')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="buttons">
                        <input type="submit" class="button is-primary" value="Update">
                        <a href="{{ route('posts.index') }}" class="button is-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var file = document.getElementById("avatar");
        file.addEventListener('change', event => {
            if (file.files.length > 0) {
                document.getElementById('file-name').innerHTML = file.files[0].name;
            }
        });
    </script>
@endsection
