<form class="box" action="{{ route('login') }}" method="POST">
    @csrf

    <div class="field">
        <div class="control has-icons-left">
            <input type="text" name="email" class="input @error('email') is-danger @enderror" placeholder="Email" value="{{ old('email') }}">
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
        </div>
        @error('email')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <div class="control has-icons-left">
            <input type="password" name="password" class="input @error('password') is-danger @enderror" placeholder="Password">
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </div>
        @error('password')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <div class="control">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="remember">
                Remember me
            </label>
        </div>
    </div>

    <div class="control">
        <button type="submit" class="button is-info is-fullwidth">
            <span class="icon">
                <i class="fas fa-sign-in-alt"></i>
            </span>
            <span>Log in</span>
        </button>
    </div>
</form>
