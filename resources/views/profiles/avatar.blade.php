<form action="{{ route('profiles.update-avatar', $profile) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="field is-grouped">
        <div class="file is-small has-name">
            <label class="file-label">
                <input type="file" id="avatar" name="avatar" class="file-input">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Upload avatar...
                    </span>
                </span>
                <span id="file-name" class="file-name">
                    {{ Str::replaceFirst("/images/avatars/", "", $profile->avatar) }}
                </span>
            </label>
        </div>
        <div class="control">
            <input type="submit" class="button is-info is-small" value="Save">
        </div>
    </div>
    @error('avatar')
        <p class="help is-danger">{{ $message }}</p>
    @enderror
</form>
