<?php

namespace App\Services;

use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorSerie
{
    public function criaSerie($nomeSerie, $qtde_temporadas, $qtde_episodios) 
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' =>$nomeSerie]);
        $this->criaTemporada($serie, $qtde_temporadas, $qtde_episodios);
        DB::commit();

        return $serie;
    }

    public function criaTemporada(Serie $serie, $qtde_temporadas, $qtde_episodios)
    {
        for($i=1; $i <= $qtde_temporadas; $i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodio($temporada, $qtde_episodios);
        }
    }

    public function criaEpisodio(Temporada $temporada, $qtde_episodios)
    {
        for ($j=1; $j <= $qtde_episodios; $j++){
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}