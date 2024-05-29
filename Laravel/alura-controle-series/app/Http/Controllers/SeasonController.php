<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    // public function index(Series $series)
    public function index(int $series)
    {
        // $seasons = $series->seasons;

        // $seasons = $series->seasons()->with('episodes')->get();

        $seasons = Season::query()
            ->with('episodes')
            ->where('series_id', $series)
            ->get();

        return view('seasons.index')
            ->with('series', $series)
            ->with('seasons', $seasons);
    }
}
