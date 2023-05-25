<link rel="stylesheet" type="text/css" href="{{asset('css/Paginator.css')}}">


@if ($paginator->lastPage() != 1)
    <div id="pagination" class="pagination">

    <!-- Link alla prima pagina -->
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}">Inizio</a> |
        @else
           <span> Inizio | </span>
        @endif

        <!-- Link alla pagina precedente -->
        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->previousPageUrl() }}">&lt; Precedente</a> |
        @else
            &lt; Precedente |
        @endif

        <!-- Numeri delle pagine -->
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($paginator->currentPage() == $i)
                <span>{{ $i }}</span> |
            @else
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a> |
            @endif
        @endfor

        <!-- Link alla pagina successiva -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Successivo &gt;</a> |
        @else
            Successivo &gt; |
        @endif

        <!-- Link all'ultima pagina -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
        @else
           <span> Fine </span>
        @endif
    </div>
@endif