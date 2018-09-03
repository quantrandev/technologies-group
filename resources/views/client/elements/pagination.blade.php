@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><button class="genric-btn disable mr-5" disabled><i class="fa fa-arrow-circle-left mr-5"></i> Trang trước</button></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="genric-btn primary mr-5"><i class="fa fa-arrow-circle-left mr-5"></i> Trang trước</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="genric-btn primary ml-5">Trang sau <i class="fa fa-arrow-circle-right ml-5"></i></a></li>
        @else
            <li class="disabled"><button class="genric-btn disable ml-5" disabled>Trang sau <i class="fa fa-arrow-circle-right ml-5"></i></button></li>
        @endif
    </ul>
@endif