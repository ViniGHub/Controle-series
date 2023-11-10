<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Repositories\EloquentSeriesRepository;
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

    public function update(Request $request, Season $season, EloquentSeriesRepository $seriesRepository)
    {
        $seasonUp = $seriesRepository->updateEp($request, $season); 

        return to_route('episodes.index', $seasonUp->id)->with('mensagem.sucesso', 'Episodios atualizados.');
    }
}
