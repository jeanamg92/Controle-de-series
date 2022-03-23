<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    //
    public function index($serieid)
    {
        $serie = Serie::find($serieid);
        $temporadas = $serie->temporadas;        

        return view('temporadas.index', compact('temporadas', 'serie'));
    }
}
