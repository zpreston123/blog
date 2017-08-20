<div class="box">
    <form method="POST" action="/login">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left">
                <input class="input" type="text" name="email" value="{{ old('email') }}">
                <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            <p class="help is-danger">
                {{ $errors->first('email') }}
            </p>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left">
                <input class="input" type="password" name="password">
                <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                </span>
            </div>
            <p class="help is-danger">
                {{ $errors->first('password') }}
            </p>
        </div>

        <div class="control">
            <button class="button is-primary" type="submit">Log in</button>
        </div>
    </form>
</div>
