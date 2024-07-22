<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function watched(Episode $episode, Request $request)
    {
        $episode->watched = $request->watched;
        $episode->save();

        return $episode;
    }
}
