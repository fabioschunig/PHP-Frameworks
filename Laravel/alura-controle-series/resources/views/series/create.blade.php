<x-layout title="Adicionar Série">
    <form action="/series/save" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</x-layout>