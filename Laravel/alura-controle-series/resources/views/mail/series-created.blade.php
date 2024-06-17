@component('mail::message')

# Série "{{ $nomeSerie }}" criada

- Temporadas: {{ $qtdTemporadas}}
- Episódios: {{ $qtdEpisodios }}

@component('mail::button', ['url' => route('seasons.index', $seriesId)])
Acesso aqui
@endcomponent

@endcomponent