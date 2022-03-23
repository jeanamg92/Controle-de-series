<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;
        $mensagem = $request->session()->get('mensagem');

        return View('episodios.index', compact('episodios','temporadaId','mensagem'));
    }
    public function assistir(Temporada $temporada, Request $request)
    {
        $epsAssistidos = $request->episodios;        
        $temporada->episodios->each(function(Episodio $episodio) use ($epsAssistidos){
            $episodio->assistido = in_array($episodio->id, $epsAssistidos);
        });
        $temporada->push();

        $request->session()->flash('mensagem', 'Episodio marcado');

        return redirect()->back();
    }
}
