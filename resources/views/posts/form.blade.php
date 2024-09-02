<div class="field">
    <label for="title" class="label">Title</label>
    <div class="control">
        <input type="text" id="title" name="title"
            class="input @error('title') is-danger @enderror"
            value="{{ old('title', $post->title ?? '') }}"
        >
    </div>
    @error('title')
        <p class="help is-danger">{{ $message }}</p>
    @enderror
</div>

<div class="field">
    <label for="category" class="label">Category</label>
    <div class="control">
        <div class="select {{ $errors->has('category') ? 'is-danger' : '' }}">
            <select id="category" name="category">
                <option value="">Select an option</option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category', $post->category->id ?? '') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @error('category')
        <p class="help is-danger">{{ $message }}</p>
    @enderror
</div>

<div class="field">
    <label for="tags" class="label">Tags</label>
    <div class="select is-multiple">
        <select id="tags" name="tags[]" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', isset($post) ? $post->tags->pluck('id')->toArray() : $tags->toArray()) ?: []) ? 'selected' : '' }}
                >
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="field">
    <label for="body" class="label">Body</label>
    <div class="control">
        <textarea id="body" name="body" class="textarea @error('body') is-danger @enderror">
            {{ old('body', $post->body ?? '') }}
        </textarea>
    </div>
    @error('body')
        <p class="help is-danger">{{ $message }}</p>
    @enderror
</div>

<div class="buttons">
    <input type="submit" class="button is-primary" value="{{ $submitButtonText }}">
    <a href="{{ route('posts.index') }}" class="button is-danger">Cancel</a>
</div>
