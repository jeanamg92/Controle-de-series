<?php

namespace App\Services;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;

class RemovedorSerie
{
    public function removeSerie($serieId) 
    {
        $serie = Serie::find($serieId);
        $serieNome = $serie->nome;
        $this->removeTemporada($serie->temporadas);
        $serie->delete();        

        return $serieNome;
    }

    public function removeTemporada($temporadas)
    {
        $temporadas->each(function (Temporada $temporada){
            $this->removeEpisodio($temporada->episodios);
            $temporada->delete();
        });

    }

    public function removeEpisodio($episodios)
    {
        $episodios->each(function (Episodio $episodio){
            $episodio->delete();
        });
    }

}