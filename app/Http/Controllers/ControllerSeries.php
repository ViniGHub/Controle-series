<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Exception;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerSeries extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    // Método para exibir todas as séries ou filtrar por ID se fornecido na requisição
    public function index(Request $request)
    {
        // Recupera o index da series especifica que deseja acessar
        $id = $request->id ?? '';

        // Obtém todas as séries do banco de dados
        $series = Series::all();
        
        // Obtém uma mensagem de sucesso da sessão, se existir
        $mensagem = $request->session()->get('mensagem.sucesso');

        // Retorna a view 'series.index' com as séries, ID e mensagem para exibição
        return view('series.index')->with('series', $series)->with('id', $id)->with('mensagem', $mensagem);
    }

    // Método para exibir o formulário de criação de série
    public function create()
    {
        // Retorna a view 'series.create'
        return view('series.create');
    }

    // Método para adicionar uma nova série ao banco de dados
    public function store(SeriesFormRequest $request)
    {
        try {
            // Adiciona uma nova série utilizando o repositório de séries
            $serie = $this->seriesRepository->add($request);
        } catch (Exception $e) {
            // Em caso de exceção, exibe a mensagem de erro
            dd($e->getMessage(), $e->getTraceAsString());
        }

        // Redireciona para a rota 'series.index' com uma mensagem de sucesso
        return to_route('series.index')->with('mensagem.sucesso', 'Série ' . $serie->nome . ' adicionada com sucesso.');
    }

    // Método para excluir uma série do banco de dados
    public function destroy(Series $series)
    {
        // Remove a série especificada
        $series->delete();

        // Redireciona para a rota 'series.index' com uma mensagem de sucesso
        return to_route('series.index')->with('mensagem.sucesso', 'Série ' . $series->nome . ' removida com sucesso.');
    }

    // Método para exibir o formulário de edição de série
    public function edit(Series $series)
    {
        // Retorna a view 'series.edit' com a série a ser editada
        return view('series.edit')->with('serie', $series);
    }

    // Método para atualizar os dados de uma série no banco de dados
    public function update(Series $series, SeriesFormRequest $request)
    {
        // Atualiza os dados da série com base nos dados fornecidos na requisição
        $series->fill($request->all());
        $series->save();

        // Redireciona para a rota 'series.index' com uma mensagem de sucesso
        return to_route('series.index')->with('mensagem.sucesso', 'Série ' . $series->nome . ' atualizada com sucesso.');
    }
}
