@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <div class="justify-content-center">
            <div class="justify-content-center row">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link changePage">پێشتر</a>
                </li>
            @else
            <li class="page-item">
                <a class="page-link changePage" href="{{$paginator->previousPageUrl()}}">پێشتر</a>
            </li>
            @endif

                    {{-- Pagination Elements --}}
        @php
        $linksOnEachSlide     = 5; // Must be an odd number
        $halfLinksOnEachSlide = ($linksOnEachSlide - 1) / 2;
        $startPage            = $paginator->currentPage() - $halfLinksOnEachSlide < 1 ? 1 : ($paginator->currentPage() - $halfLinksOnEachSlide);
        $endPage              = ($paginator->currentPage() + $halfLinksOnEachSlide) > $paginator->lastPage() ? $paginator->lastPage() : ($paginator->currentPage() + $halfLinksOnEachSlide);
        $endPage              = $endPage < $linksOnEachSlide ? $linksOnEachSlide : $endPage;
        $startPage            = $endPage - $linksOnEachSlide < $startPage ? $endPage - ($halfLinksOnEachSlide * 2) : $startPage;
        @endphp

        @foreach(range($startPage, $endPage) as $page)
            @if ($page == $paginator->currentPage())
                <li class="page-item" aria-current="page">
                    <a class="page-link active numOfPage">
                        {{ $page }}
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->url($page) }}" class="page-link numOfPage">
                            {{ $page }}
                    </a>
                </li>
            @endif
        @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link changePage" href="{{$paginator->nextPageUrl()}}">دواتر</a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <a class="page-link changePage" href="{{$paginator->nextPageUrl()}}">دواتر</a>
                    </li>
                    @endif
        </ul>
    </div>
    </div>
    </nav>
@endif
