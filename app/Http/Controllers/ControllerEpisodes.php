<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class ControllerEpisodes extends Controller {
    public function __construct(private SeriesRepository $seriesRepository) {
    }
    public function index(Season $season) {
        return view('episodes.index')->with('episodes', $season->episodes)->with('season', $season);
    }

    public function update(Request $request, Season $season) {
        $watchedEps = $request->epCheck;
        $season->Episodes->each(function (Episode $episode) use ($watchedEps) {
            $episode->watched = in_array($episode->id, $watchedEps);
        });

        $season->push();
        
        return to_route('episodes.index', $season->id);
    }
}