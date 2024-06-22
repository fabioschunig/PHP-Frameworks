<x-layout title="Adicionar Série">

    <form action="{{ route('series.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" autofocus value="{{ old('name') }}">
            </div>

            <div class="col-2">
                <label for="seasonsNumber" class="form-label">Nº Temporadas:</label>
                <input type="text" id="seasonsNumber" name="seasonsNumber" class="form-control" value="{{ old('seasonsNumber') }}">
            </div>

            <div class="col-2">
                <label for="episodesNumber" class="form-label">Nº Episódios:</label>
                <input type="text" id="episodesNumber" name="episodesNumber" class="form-control" value="{{ old('episodesNumber') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" name="cover" class="form-control" accept="image/gif, image/jpeg, imagem/png">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>

</x-layout>