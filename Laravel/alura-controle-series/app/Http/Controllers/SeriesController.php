<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // $series = DB::select('SELECT nome FROM series');

        // $series = Serie::all();

        $series = Serie::query()->orderBy('nome')->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        // $request->session()->forget('mensagem.sucesso');

        // dd($series);

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nomeSerie = $request->input('nome');

        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);

        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        $serie = Serie::create($request->all());

        // session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");

        // return redirect('/series');

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series, Request $request)
    {
        // dd($request->series);
        //Serie::destroy($request->series);

        // dd($series);
        $series->delete();

        // $request->session()->put('mensagem.sucesso', 'Série removida com sucesso');

        // session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')
            ->with('serie', $series);
    }

    public function update(Serie $series, Request $request)
    {
        // $series->nome = $request->get('nome');
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' alterada com sucesso");
    }
}
