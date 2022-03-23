@extends('layout')

@section('titulo')
Eppisodios
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

<ul class="list-group">
    @foreach ($episodios as $episodio)
    <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="post" enctype="multipart/form-data">
        @csrf
        <li class="list-group-item d-flex justify-content-between aligin-items-center">
            <a href="">Episodio {{ $episodio->numero }}</a>
            <input type='checkbox' name='episodios[]' value='{{ $episodio->id }}' {{ $episodio->assistido ? 'checked' : '' }}>
        </li>            
    @endforeach
</ul>
<button class="btn btn-primary mt-1 mb-1">Salvar</button>
</form>
@endsection
