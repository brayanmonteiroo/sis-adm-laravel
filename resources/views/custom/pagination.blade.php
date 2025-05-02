{{-- Paginação customizada, para usar basta ativar na view:
    {{-- {{ $courses->links('custom.pagination') }} --}}

    @if ($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination justify-content-center">
    
            {{-- Botão Anterior --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link">Anterior</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
                </li>
            @endif
    
            {{-- Links das páginas (números ocultos no mobile) --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled d-none d-sm-block">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif
    
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active d-none d-sm-block" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item d-none d-sm-block">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
    
            {{-- Botão Próxima --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link">Próxima</a>
                </li>
            @endif
    
        </ul>
    </nav>
    @endif
    