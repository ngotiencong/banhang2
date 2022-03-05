@if ($paginator->hasPages())
<!-- Pagination -->
<div class="product__pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <a class="disabled">
            <span><i class="fa fa-long-arrow-left"></i></span>
        </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <span><i class="fa fa-long-arrow-left"></i></span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a>{{ $page }}</a>
        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page ==
        $paginator->lastPage())
        <a href="{{ $url }}">{{ $page }}</a>
        @elseif ($page == $paginator->lastPage() - 1)
        <a href="{{ $url }}">{{$page}}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <span><i class="fa fa-long-arrow-right"></i></span>
            </a>
        @else
            <span><i class="fa fa-long-arrow-right"></i></span>
        @endif
    </ul>
</div>
<!-- Pagination -->
@endif