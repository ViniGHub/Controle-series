<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class ControllerSeasons extends Controller
{
    // Método para exibir todas as temporadas de uma série específica
    public function index(Series $series) 
    {
        // Obtém todas as temporadas relacionadas à série, carregando também os episódios de cada temporada
        $seasons = $series->seasons()->with('episodes')->get();
        
        // Retorna a view 'seasons.index' com as temporadas e a série relacionada para exibição
        return view('seasons.index')->with('seasons', $seasons)->with('series', $series);
    }
}