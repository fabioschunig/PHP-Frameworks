<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso'),
        ]);
    }

    public function update(Request $request, Season $season)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $watchedEpisodes = $request->episodes;
            $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
                $episode->watched = in_array($episode->id, $watchedEpisodes);
            });

            $season->push();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return to_route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episódios marcados com sucesso');
    }
}
