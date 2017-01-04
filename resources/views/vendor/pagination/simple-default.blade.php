@if ($paginator->hasPages())
    <nav class="pagination">
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <a class="button is-disabled" style="margin-right:10px;">Previous</a>
            @else
               <a class="button" style="margin-right:10px;" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
            @endif

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <a class="button" style="margin-left:10px;" href="{{ $paginator->nextPageUrl() }}" rel="next">Next page</a>
            @else
                <a class="button is-disabled" style="margin-left:10px;">Next page</a>
            @endif
    </nav>
@endif
