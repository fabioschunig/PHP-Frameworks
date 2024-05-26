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
        $request->session()->forget('mensagem.sucesso');

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

        Serie::create($request->all());

        // return redirect('/series');

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        // dd($request->series);

        Serie::destroy($request->series);

        $request->session()->put('mensagem.sucesso', 'Série removida com sucesso');

        return to_route('series.index');
    }
}
