<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Exception;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerSeries extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository) {
    }

    public function index(Request $request)
    {
        $id = $request->id ?? '';
        $series = Series::all();
        $mensagem = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('id', $id)->with('mensagem', $mensagem);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        try {
            $serie = $this->seriesRepository->add($request);
        } catch (Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
        }
        

        return to_route('series.index')->with('mensagem.sucesso', 'Série ' . $serie->nome . ' adicionada com sucesso.');
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')->with('mensagem.sucesso', 'Série ' . $series->nome . ' removida com sucesso.');
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', 'Série ' . $series->nome . ' atualizada com sucesso.');
    }
}
