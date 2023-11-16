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
    public function add(SeriesFormRequest $request): Series {
        return DB::transaction(function () use ($request) {
            $serie = Series::create($request->all());

            $seasons = [];
            for ($i = 1; $i  <= $request->season; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            $i = 0;
            foreach ($serie->seasons as $season) {
                for ($j = 1; $j <= $request->episode[$i]; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
                $i++;
            }
            Episode::insert($episodes);

            DB::commit();

            return $serie;
        });
    }

    public function updateEp(Request $request, Season $season): Season
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

            return $season;
        });
    }
}
