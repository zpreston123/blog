<div class="box">
    <h2>
        <a class="post-title" href="{{ route('posts.show', $post->id) }}">
            {{ $post->title }}
        </a>
    </h2>
    <p>{{ Str::limit($post->body, 200) }}</p>
    @unless ($post->tags->isEmpty())
        <div class="tags">
            @foreach ($post->tags as $tag)
                <span class="tag is-info">{{ $tag->name }}</span>
            @endforeach
        </div>
    @endunless
    <div class="block">
        <span class="icon-text">
            <span class="icon">
                <i class="fas fa-{{ $post->author->gender }}"></i>
            </span>
            <span>{{ $post->author->name }}</span>&nbsp;
        </span>&nbsp;|
        <span class="icon-text">
            <span class="icon">
                <i class="far fa-clock"></i>
            </span>
            <span>{{ $post->created_at->diffForHumans() }}</span>
        </span>
    </div>
    <div class="block">
        <like-button :post="{{ $post }}"></like-button>
    </div>
</div>
