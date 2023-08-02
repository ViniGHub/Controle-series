<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\SeriesRepository;

class ControllerEpisodes extends Controller {
    public function __construct(private SeriesRepository $seriesRepository) {
    }
    public function index() {
        return view('episodes.index');
    }
}