@if ($paginator->hasPages())
    <div class="basic-pagination mt-30 wow fadeInUp" data-wow-delay=".3s">
        <ul class="pagination" role="navigation">
            {{-- Previous Page Link --}}


            @if (!$paginator->onFirstPage())
                <li class="page-item " aria-disabled="@lang('pagination.previous')" aria-label="@lang('pagination.previous')">
                    <a class="prev page-numbers" href="{{ $paginator->url(1) }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo; &lsaquo;</a>
                </li>

                <li class="page-item">
                    <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            <?php
            $start = $paginator->currentPage() - 1; // show 3 pagination links before current
            $end = $paginator->currentPage() + 1; // show 3 pagination links after current
            if ($start < 1) {
                $start = 1; // reset start to 1
                $end += 1;
            }
            if ($end >= $paginator->lastPage()) {
                $end = $paginator->lastPage();
            } // reset end to last page
            ?>

            {{-- @if ($start > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">{{ 1 }}</a>
                </li>
                @if ($paginator->currentPage() != 2)
                    
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
            @endif --}}
            @for ($i = $start; $i <= $end; $i++)
            
                @if ($paginator->currentPage() == $i)
                    <li><span aria-current="page" class="page-numbers current">{{ $i }}</span></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            {{-- @if ($end < $paginator->lastPage())
                @if ($paginator->currentPage() + 3 != $paginator->lastPage())

                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
                <li class="page-item">
                    <a class="page-link"
                        href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                </li>
            @endif --}}

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-numbers " href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
         
                <li class="page-item disabled" aria-disabled="@lang('pagination.next')" aria-label="@lang('pagination.next')">
                    <a class="page-numbers " href="{{ $paginator->url($paginator->lastPage()) }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo; &rsaquo;</a>
                </li>
            @endif
        </ul>
    </div>
@endif
