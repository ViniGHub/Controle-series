<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ControllerEpisodes extends Controller {
    public function index() {
        return view('episodes.index');
    }
}