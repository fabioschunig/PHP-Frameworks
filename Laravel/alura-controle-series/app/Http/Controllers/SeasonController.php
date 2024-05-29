<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(Series $series)
    {
        // $seasons = $series->seasons;
        $seasons = $series->seasons()->with('episodes')->get();

        return view('seasons.index')
            ->with('series', $series)
            ->with('seasons', $seasons);
    }
}
