<article class="media">
    <div class="media-left">
        <figure class="image is-64x64">
            <img src="{{ $profile->avatar }}">
        </figure>
    </div>
    <div class="media-content">
        <div class="content">
            <p>
                <a href="{{ route('profiles.show', $profile->id) }}">
                    <strong>
                        {{ $profile->name }}
                    </strong>
                </a>
            </p>
        </div>
    </div>
</article>
