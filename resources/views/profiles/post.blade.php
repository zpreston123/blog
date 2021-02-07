<div class="column is-4">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                {{ $post->title }}
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>
                    {{ Str::limit($post->body, 80) }}<br>
                    <small>Created: {{ $post->created_at->diffForHumans() }}</small> |
                    <small>Updated: {{ $post->updated_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
        <footer class="card-footer">
            <a class="card-footer-item" href="/posts/{{ $post->id }}/edit">Edit</a>
            <a class="card-footer-item" id="delete-button">
                Delete
                {{ Form::open(['route' => ['posts.destroy', $post], 'id' => 'delete-form', 'method' => 'delete']) }}
                {{ Form::close() }}
            </a>
        </footer>
    </div>
</div>
