<div class="box">
    <form method="POST" action="/login">
        {{ csrf_field() }}

        <label for="email" class="label">Email</label>
        <p class="control has-icon">
            <input type="text" name="email" value="{{ old('email') }}" class="input">
            <span class="icon is-small">
                <i class="fa fa-envelope"></i>
            </span>
            <span class="help is-danger">
                {{ $errors->first('email') }}
            </span>
        </p>

        <label for="password" class="label">Password</label>
        <p class="control has-icon">
            <input type="password" name="password" class="input">
            <span class="icon is-small">
                <i class="fa fa-lock"></i>
            </span>
            <span class="help is-danger">
                {{ $errors->first('password') }}
            </span>
        </p>

        <p class="control">
            <input type="submit" value="Log in" class="button is-primary">
        </p>
    </form>
</div>
