@if ($paginator->hasPages())
    <nav class="my-4 flex items-center justify-center">
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-outline btn-disabled" disabled aria-disabled="true"
                    aria-label="@lang('pagination.previous')">
                    Previous
                </button>
            @else
                <a class="join-item btn btn-outline" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">
                    Previous
                </a>
            @endif

            <button class="join-item btn btn-ghost pointer-events-none hidden sm:inline-flex">
                Page {{ $paginator->currentPage() }}
            </button>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="join-item btn btn-outline" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">
                    Next
                </a>
            @else
                <button class="join-item btn btn-outline btn-disabled" disabled aria-disabled="true"
                    aria-label="@lang('pagination.next')">
                    Next
                </button>
            @endif
        </div>
    </nav>
@endif