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
    <p>
        <i class="fas fa-{{ $post->author->gender }}"></i>
        {{ $post->author->name }}&nbsp;|&nbsp;
        <i class="far fa-clock"></i>
        {{ $post->created_at->diffForHumans() }}
    </p>
    <like-button :post="{{ $post }}"></like-button>
</div>
