<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index()
    {
        return Series::all();
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

        $series = Series::where('id', $seriesId)
            ->with('seasons.episodes')
            ->first();

        return $series;
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
}