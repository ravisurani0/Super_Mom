@if ($paginator->hasPages())
<div class="basic-pagination mt-30 wow fadeInUp" data-wow-delay=".3s">
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="prev page-numbers" href="#">
                <i class="icon-022-left"></i>
            </a>
        </li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="prev page-numbers">
                <i class="icon-022-left"></i>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li><span aria-current="page" class="page-numbers current">{{ $page }}</span></li>

        @else
        <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="next page-numbers">
                <i class="icon-021-next"></i>
            </a>
        </li>
        @else
        <li><a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')" class="next page-numbers">
                <i class="icon-021-next"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
@endif