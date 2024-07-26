<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index(Request $request)
    {
        // dd($request->has('name'));

        $query = Series::query();

        if ($request->has('name')) {
            // return Series::whereName($request->name)->get();

            // return Series::where('name', $request->name)->get();

            $query->where('name', $request->name);
        }

        return $query->get();
    }

    public function store(SeriesFormRequest $request)
    {
        // return response()
        //     ->json(Series::create($request->all()), 201);

        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    // public function show(Series $series)
    public function show(int $seriesId)
    {
        // return $series;

        // $series = Series::where('id', $seriesId)
        //     ->with('seasons.episodes')
        //     ->first();

        $seriesModel = Series::with('seasons.episodes')->find($seriesId);
        if ($seriesModel === null) {
            return response()->json(['message' => 'Series not found'], 404);
        }

        // return $series;
        return $seriesModel;
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy(int $seriesId)
    {
        Series::destroy($seriesId);

        return response()->noContent();
    }

    public function seasons(Series $series)
    {
        return $series->seasons;
    }

    public function episodes(Series $series)
    {
        return $series->episodes;
    }
}
