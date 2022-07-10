<div class="field">
    {{ Form::label('title', 'Title', ['class' => 'label']) }}
    <div class="control">
        {{ Form::text('title', null, ['class' => 'input' . ($errors->has('title') ? ' is-danger' : '')]) }}
    </div>
    {!! $errors->first('title', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="field">
    {{ Form::label('category', 'Category', ['class' => 'label']) }}
    <div class="control">
        <div class="select {{ $errors->has('category') ? 'is-danger' : '' }}">
            {{ Form::select('category', ['' => 'Select an option'] + $categories, isset($post->category->id) ? $post->category->id : null) }}
        </div>
    </div>
    {!! $errors->first('category', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="field">
    {{ Form::label('tags', 'Tags', ['class' => 'label']) }}
    <div class="control">
        {{ Form::select('tags[]', $tags, null, ['data-type' => 'tags', 'data-placeholder' => 'Choose Tags', 'multiple']) }}
    </div>
</div>

<div class="field">
    {{ Form::label('body', 'Body', ['class' => 'label']) }}
    <div class="control">
        {{ Form::textarea('body', null, ['class' => 'textarea' . ($errors->has('body') ? ' is-danger' : '')]) }}
    </div>
    {!! $errors->first('body', '<p class="help is-danger">:message</p>') !!}
</div>

<div class="buttons">
    {{ Form::submit($submitButtonText, ['class' => 'button is-primary']) }}
    {{ Form::button('Cancel', ['class' => 'button is-danger', 'onclick' => 'document.location.href="/posts"']) }}
</div>
