<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request)
    {
        // $series = DB::select('SELECT name FROM series');

        $series = Series::all();

        // $series = Series::query()->orderBy('name')->get();

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

    public function store(SeriesFormRequest $request)
    {
        // $seriesName = $request->input('name');

        // DB::insert('INSERT INTO series (name) VALUES (?)', [$seriesName]);

        // $series = new Series();
        // $series->name = $seriesName;
        // $series->save();

        // dd($request->all());

        // dd($request->file('cover'));
        $coverPath = $request->file('cover')->store('series_cover', 'public');
        $request->coverPath = $coverPath;

        $series = $this->repository->add($request);

        \App\Events\SeriesCreatedEvent::dispatch(
            $series->name,
            $series->id,
            $request->seasonsNumber,
            $request->episodesNumber,
        );

        // session()->flash('mensagem.sucesso', "Série '{$series->name}' adicionada com sucesso");

        // return redirect('/series');

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' adicionada com sucesso");
    }

    public function destroy(Series $series, Request $request)
    {
        // dd($request->series);
        //Series::destroy($request->series);

        // dd($series);
        $series->delete();

        // $request->session()->put('mensagem.sucesso', 'Série removida com sucesso');

        // session()->flash('mensagem.sucesso', "Série '{$series->name}' removida com sucesso");

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        // dd($series->seasons);

        return view('series.edit')
            ->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        // $series->name = $request->get('name');

        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' alterada com sucesso");
    }
}
