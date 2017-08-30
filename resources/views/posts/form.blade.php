<div class="field">
    {{ Form::label('title', 'Title', ['class' => 'label']) }}
    <div class="control">
        {{ Form::text('title', null, ['class' => 'input']) }}
    </div>
    {!! $errors->first('title', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="field">
    {{ Form::label('category', 'Category', ['class' => 'label']) }}
    <div class="control">
        <span class="select">
            {{ Form::select('category', ['' => 'Select an option'] + $categories, null) }}
        </span>
    </div>
    {!! $errors->first('category', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="field">
    {{ Form::label('tags','Tags', ['class' => 'label']) }}
    <div class="control">
        <span class="select is-multiple">
            {{ Form::select('tags[]', $tags, null, ['multiple']) }}
        </span>
    </div>
</div>

<div class="field">
    {{ Form::label('body', 'Body', ['class' => 'label']) }}
    <div class="control">
        {{ Form::textarea('body', null, ['class' => 'textarea']) }}
    </div>
    {!! $errors->first('body', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="field is-grouped">
    <div class="control">
        {{ Form::submit($submitButtonText, ['class' => 'button is-primary']) }}
    </div>
    <div class="control">
        {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/posts"']) }}
    </div>
</div>
