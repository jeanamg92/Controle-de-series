<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesRequest;
use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use App\Services\CriadorSerie;
use App\Services\RemovedorSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    //
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return View('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return View('series.create');
    }

    public function store(SeriesRequest $request, CriadorSerie $criadorSerie)
    {        
        $serie = $criadorSerie->criaSerie($request->nome, $request->qtde_temporadas, $request->qtde_episodios);                
        $request->session()->flash('mensagem', "Serie {$serie->nome} incluida com secusso.");
        return redirect()->route('listar_series');        
    }

    public function editaNome(Request $request)
    {        
        $novoNome = $request->nome;
        $serie = Serie::find($request->id);
        $serie->nome = $novoNome;
        $serie->save();        
    }

    public function excluir(Request $request, RemovedorSerie $removedorSerie)
    {
        $serieNome = $removedorSerie->removeSerie($request->id);
        $request->session()->flash('mensagem', "Serie {$serieNome} excluida com secusso.");

        return redirect()->route('listar_series');
    }
}
