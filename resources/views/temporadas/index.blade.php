@extends('layout')

@section('titulo')
Temporadas de {{ $serie->nome }}
@endsection

@if (isset($mensagem))
<div class="alert alert-success">{{ $mensagem }}</div>
@endif

@section('conteudo')

<ul class="list-group">
    @foreach ($temporadas as $temporada)    
        <li class="list-group-item d-flex justify-content-between aligin-items-center">
            <a href="/temporadas/{{ $temporada->id }}/episodios">Temporada {{ $temporada->numero }}</a>
            <span class="badge-secondary">{{ $temporada->getEpAssistidos()->count() }} / {{ $temporada->episodios->count() }}</span>   
        </li>        
    @endforeach
</ul>            
@endsection
