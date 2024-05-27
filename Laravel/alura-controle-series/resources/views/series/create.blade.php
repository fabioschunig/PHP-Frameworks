<x-layout title="Adicionar Série">
    <x-series.form :action="route('series.store')" :nome="old('nome')" :update="false" />
</x-layout>