<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
<<<<<<< HEAD

class ControllerEpisodes extends Controller {
    public function index() {
        return view('episodes.index');
=======
use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Repositories\SeriesRepository;

class ControllerEpisodes extends Controller {
    public function __construct(private SeriesRepository $seriesRepository) {
    }
    public function index(Season $season) {
        // dd($season->episodes);
        return view('episodes.index')->with('episodes', $season->episodes)->with('season', $season);
>>>>>>> 1f2e0b4fd74d24fe0a0603285603cf85fbac6f94
    }
}