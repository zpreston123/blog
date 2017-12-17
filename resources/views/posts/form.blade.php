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
        {{ Form::input('tags', 'tags[]', implode(',', $tags), ['class' => 'input']) }}
    </div>
</div>

<div class="field">
    {{ Form::label('body', 'Body', ['class' => 'label']) }}
    <div class="control">
        {{ Form::textarea('body', null, ['class' => 'textarea']) }}
    </div>
    {!! $errors->first('body', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="buttons">
    <submit-button class="is-primary">
        {{ $submitButtonText }}
    </submit-button>
    {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/posts"']) }}
</div>
