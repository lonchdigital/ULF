@if ($paginator->hasPages())

    {{-- Previous Page Link --}}
    {{--@if ($paginator->onFirstPage())
        <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" href="#"><</a>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
    @endif--}}

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item current-page" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item current-page active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item current-page"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    {{--@if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
    @else
        <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true" class="page-link">&rsaquo;</span>
        </li>
    @endif--}}

@endif
