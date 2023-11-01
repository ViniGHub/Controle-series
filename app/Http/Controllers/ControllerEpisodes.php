<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerEpisodes extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }
    public function index(Season $season)
    {
        return view('episodes.index')->with('episodes', $season->episodes)->with('season', $season)->with('mensagem', session('mensagem.sucesso'));
    }

    public function update(Request $request, Season $season)
    {
        $watchedEp = $request->epCheck ?? [];

        return DB::transaction(function () use ($season, $watchedEp) {
            DB::table('episodes')
            ->where('season_id', $season->id)
            ->whereIn('id', $watchedEp)
            ->update(['watched' => 1]);

            DB::table('episodes')
            ->where('season_id', $season->id)
            ->whereNotIn('id', $watchedEp)
            ->update(['watched' => 0]);

            DB::commit();

            return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episodios atualizados.');
        });
    }
}
