
@if ($paginator->hasPages())
    <nav class="flexbox">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

                    <span class="btn btn-white disabled">@lang('pagination.previous')</span>
            @else
                    <a class="btn btn-white" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a class="btn btn-white " style="float:right;" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                    <span class="btn btn-white disabled" style="float:right;">@lang('pagination.next')</span>
            @endif

    </nav>
@endif
