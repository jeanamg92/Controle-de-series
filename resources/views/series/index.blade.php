@extends('layout')

@section('titulo')
Series Lista
@endsection

@include('mensagem', ['mensagem' => $mensagem])

@section('conteudo')
<a href="/series/create" class="btn btn-dark mb-2">Adicionar</a>
<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between aligin-items-center">
            <span class="" id='nome-serie-{{ $serie->id }}'> {{ $serie->nome }} </span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

             <span class="d-flex">
                <button class="btn btn-info btn-sm  m-1" onclick="toggleInput({{ $serie->id }})">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm m-1"><i class="fa-solid fa-up-right-from-square"></i></a>
                <form method="POST" action="/series/excluir/{{$serie->id}}" onsubmit="return confirm('Are you sure')">
                    @csrf
                    <button class="btn btn-danger btn-sm  m-1"><i class="fa-solid fa-trash"></i></button>
                </form>                        
            </span>
        </li>        
    @endforeach
</ul>            

<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId){        
        let formData = new FormData();        
        const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
        const token = document.querySelector('input[name="_token"]').value;
        formData.append('nome', nome);
        formData.append('_token', token);        

        const url = `/series/${serieId}/editaNome`;
        
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(()=>{
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;

        });
    }
</script>
@endsection
