<article class="media">
    <figure class="media-left">
        <p class="image is-64x64">
            <img src="{{ $follower->avatar }}">
        </p>
    </figure>
    <div class="media-content">
        <div class="content">
            <p>
                <a href="{{ route('profiles.show', $follower->id) }}">
                    <strong>{{ $follower->name }}</strong>
                </a><br>
                <small>{{ $follower->email }}</small>
            </p>
        </div>
    </div>
</article>
