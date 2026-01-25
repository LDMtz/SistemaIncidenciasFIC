@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();

    // Calculamos el rango de páginas a mostrar
    $start = max($currentPage - 1, 1);
    $end = min($start + 2, $lastPage);

    // Ajustamos el inicio si estamos cerca del final
    if ($end - $start < 2) {
        $start = max($end - 2, 1);
    }
@endphp

<td colspan="{{ $colspan }}">
    <div class="flex justify-between items-center px-5 py-1.5 text-xs">
        <div>
            Mostrando
            <span class="font-black">{{ $paginator->firstItem() }}</span> -
            <span class="font-black">{{ $paginator->lastItem() }}</span> de
            <span>{{ $paginator->total() }}</span>
        </div>
        <div class="flex items-center space-x-1">
            {{-- Botón Anterior --}}
            @if ($paginator->onFirstPage())
                <span class="px-2 py-1 text-slate-500">&lt;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() . (request('sort') ? '&sort=' . request('sort') : '') }}"
                class="px-2 py-1 rounded hover:bg-slate-600 ">&lt;</a>
            @endif

            {{-- Botones de página con solo 3 visibles --}}
            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $currentPage)
                    <span class="px-2 py-1 bg-slate-900 text-text-1 rounded">{{ $i }}</span>
                @else
                    <a href="{{ $paginator->url($i) . (request('sort') ? '&sort=' . request('sort') : '') }}"
                    class="px-2 py-1 rounded hover:bg-slate-600 ">{{ $i }}</a>
                @endif
            @endfor

            {{-- Botón Siguiente --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() . (request('sort') ? '&sort=' . request('sort') : '') }}"
                class="px-2 py-1 rounded hover:bg-slate-600 ">&gt;</a>
            @else
                <span class="px-2 py-1 text-slate-500">&gt;</span>
            @endif
        </div>
    </div>
</td>