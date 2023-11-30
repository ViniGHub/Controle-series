<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        // Iniciando uma transação no banco de dados usando DB::transaction do Laravel
        return DB::transaction(function () use ($request) {
            // Criando um novo registro de série no banco de dados usando os dados da requisição
            $serie = Series::create($request->all());

            // Inicializando um array vazio para armazenar dados das temporadas
            $seasons = [];

            // Iterando sobre o número de temporadas fornecido na requisição
            for ($i = 1; $i  <= $request->season; $i++) {
                // Criando um array para cada temporada contendo series_id e número
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }

            // Inserindo todos os dados das temporadas gerados na tabela 'seasons'
            Season::insert($seasons);

            // Inicializando um array vazio para armazenar dados dos episódios
            $episodes = [];
            $i = 0;

            // Iterando sobre cada temporada da série recém-criada
            foreach ($serie->seasons as $season) {
                // Iterando sobre o número de episódios para cada temporada fornecido na requisição
                for ($j = 1; $j <= $request->episode[$i]; $j++) {
                    // Criando um array para cada episódio contendo season_id e número
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
                $i++;
            }

            // Inserindo todos os dados dos episódios gerados na tabela 'episodes'
            Episode::insert($episodes);

            // Confirmar a transação se todas as operações no banco de dados forem bem-sucedidas
            DB::commit();

            // Retornar a série recém-criada
            return $serie;
        });
    }

    public function updateEp(Request $request, Season $season): Season
    {
        // Obtém os episódios marcados como assistidos a partir da requisição ou um array vazio se nenhum foi fornecido
        $watchedEp = $request->epCheck ?? [];

        // Inicia uma transação no banco de dados usando DB::transaction do Laravel
        return DB::transaction(function () use ($season, $watchedEp) {
            // Atualiza os episódios marcados como assistidos para 'watched = 1'
            DB::table('episodes')
                ->where('season_id', $season->id)
                ->whereIn('id', $watchedEp)
                ->update(['watched' => 1]);

            // Atualiza os episódios não marcados como assistidos para 'watched = 0'
            DB::table('episodes')
                ->where('season_id', $season->id)
                ->whereNotIn('id', $watchedEp)
                ->update(['watched' => 0]);

            // Confirma a transação se todas as operações no banco de dados forem bem-sucedidas
            DB::commit();

            // Retorna a temporada após as atualizações
            return $season;
        });
    }
}
