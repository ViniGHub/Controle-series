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

    // Método para exibir todos os episódios de uma temporada específica
    public function index(Season $season)
    {
        // Retorna a view 'episodes.index' com os episódios da temporada, a temporada em si,
        // uma mensagem de sucesso da sessão e a série relacionada à temporada para exibição
        return view('episodes.index')
            ->with('episodes', $season->episodes)
            ->with('season', $season)
            ->with('mensagem', session('mensagem.sucesso'))
            ->with('serie', $season->Series);
    }

    // Método para atualizar os episódios de uma temporada
    public function update(Request $request, Season $season, EloquentSeriesRepository $seriesRepository)
    {
        // Atualiza os episódios da temporada utilizando o repositório de séries
        $seasonUp = $seriesRepository->updateEp($request, $season); 

        // Redireciona para a rota 'episodes.index' com o ID da temporada atualizada e uma mensagem de sucesso
        return to_route('episodes.index', $seasonUp->id)->with('mensagem.sucesso', 'Episódios atualizados.');
    }
}
