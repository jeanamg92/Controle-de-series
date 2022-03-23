@extends('layout')

@section('titulo')
Adicionar Series
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action='{{ route('inserir_serie') }}'>
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="" class="">Nome:</label>
                <input type="text" class="input-group" name="nome">
                <button class="btn-primary">Adicionar</button>
            </div>

            <div class="col col-2">
                <label for="">N Temporadas</label>
                <input type="number" name="qtde_temporadas" id="">
            </div>

            <div class="col col-2">
                <label for="">Numero Episodios</label>
                <input type="number" name="qtde_episodios" id="">
            </div>
        </div>
    </form>

@endsection
    