<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Repositories\SeriesRepository;

class ControllerEpisodes extends Controller {
    public function __construct(private SeriesRepository $seriesRepository) {
    }
    public function index(Season $season) {
        return view('episodes.index')->with('episodes', $season->episodes)->with('season', $season);
    }
}