@if ($paginator->hasPages())
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="material-icons">chevron_left</i></span></li>
        @else
            <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">chevron_left</i></a></li>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled"><span><i class="material-icons">chevron_right</i></span></li>
        @endif
    </ul>
@endif
