{{ Form::model($profile, ['route' => ['profiles.update-avatar', $profile], 'enctype' => 'multipart/form-data', 'method' => 'PUT']) }}
    <div class="field is-grouped">
        <div class="file is-small has-name">
            <label class="file-label">
                {{ Form::file('avatar', ['class' => 'file-input', 'id' => 'avatar']) }}
                <span class="file-cta">
                    <span class="file-icon"><i class="fa fa-upload"></i></span>
                    <span class="file-label">Upload avatar...</span>
                </span>
                <span id="file-name" class="file-name">
                    {{ str_replace("/images/avatars/", "", $profile->avatar) }}
                </span>
            </label>
        </div>
        <div class="control">
            <submit-button class="is-info is-small">Save</submit-button>
        </div>
    </div>
    {!! $errors->first('avatar', '<p class="help is-danger">:message</p>') !!}
{{ Form::close() }}
