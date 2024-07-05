<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        return Series::all();
    }
}
