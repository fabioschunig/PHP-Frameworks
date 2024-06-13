<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-light mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth<a href="{{ route('seasons.index', $series->id) }}"> @endauth
                {{ $series->name }}
                @auth </a> @endauth

            @auth
            <span class="d-flex">
                <a href="{{ route('series.edit', $series->id) }}" class="btn btn-secondary btn-sm">Editar</a>

                <form action="{{ route('series.destroy', $series->id) }}" method="POST" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
            @endauth
        </li>
        @endforeach
    </ul>
</x-layout>