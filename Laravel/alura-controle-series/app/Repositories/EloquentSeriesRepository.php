<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request) {
            // $series = Series::create($request->all());
            $series = Series::create([
                'name' => $request->name,
                'cover' => $request->cover,
            ]);

            $seasons = [];
            for ($i = 1; $i <= $request->seasonsNumber; $i++) {
                // $season = $series->seasons()->create([
                //     'number' => $i,
                // ]);

                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($j = 1; $j <= $request->episodesNumber; $j++) {
                    // $season->episodes()->create([
                    //     'number' => $j,
                    // ]);

                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j,
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;
        });
    }
}
