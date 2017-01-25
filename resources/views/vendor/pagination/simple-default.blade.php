@if ($paginator->hasPages())
    <nav class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <a class="pagination-previous is-disabled">Previous</a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">Previous</a>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">Next page</a>
        @else
            <a class="pagination-next is-disabled">Next page</a>
        @endif
    </nav>
@endif
