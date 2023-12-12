@extends('layout.app')

@section('title', 'Home')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <div class="row">
        <div class=" mt-0">
            <h2 class="page-title">Perguntas</h2>

            @if(session('success'))
                <div class="alert alert-success mt-3 mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
    
            @if ($perguntas->isEmpty())
                <div class="mb-5">
                    <a class="btn btn-success" href="{{route('perguntas.create')}}">Adicionar</a>
                </div>
                <p>Nenhuma pergunta cadastrada.</p>
            @else
                {{-- Exibir Pergunta Atual --}}
                <div class="card mb-3">
                    <div class="ms-3 mb-3 mt-3">
                        <a class="btn btn-success" href="{{route('perguntas.create')}}">Adicionar</a>
                    </div>
                    <div class="col card-body">
                        <div class="mb-1"><strong>Categoria:</strong> {{ $perguntaAtual->categoria->nome }}</div>
                        <div class="mb-1"><strong>Pergunta:</strong> {{ $perguntaAtual->pergunta }}</div>
                        <div class="mb-1"><strong>Alternativa 1:</strong> {{$perguntaAtual->alternativa1}}</div>
                        <div class="mb-1"><strong>Alternativa 2:</strong> {{$perguntaAtual->alternativa2}}</div>
                        <div class="mb-1"><strong>Alternativa 3:</strong> {{$perguntaAtual->alternativa3}}</div>
                        <div class="mb-1"><strong>Alternativa 4:</strong> {{$perguntaAtual->alternativa4}}</div>
                        <div class="mb-1"><strong>Alternativa Correta:</strong> {{ $perguntaAtual->respostaCorreta }}</div>
                        <div class="mb-1"><strong>Dificuldade:</strong> {{ $perguntaController->obterNomeDificuldade($perguntaAtual->dificuldade) }}</div>                   
                        
                    </div>

                    {{-- Botões de Editar e Deletar --}}
                <div class="col mt-3 mb-3 text-center">
                    <a href="{{ route('perguntas.edit', ['pergunta' => $perguntaAtual]) }}" class="me-1 btn btn-primary">Editar</a>
                    
                    <form method="post" action="{{ route('perguntas.delete', ['pergunta' => $perguntaAtual]) }}" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class=" ms-1 btn btn-danger">Deletar</button>
                    </form>
                </div>
                </div>

                
    
                {{-- Navegação entre Perguntas --}}
                <form method="post" class="text-center" action="{{ route('perguntas.navigate') }}">
                    @csrf
                    <input type="hidden" name="perguntaAtualId" value="{{ $perguntaAtual->id }}">
    
                    <button type="submit" name="direcao" value="anterior" class="btn btn-secondary">Anterior</button>
                    <button type="submit" name="direcao" value="proximo" class="btn btn-secondary">Próximo</button>
                </form>
    
                
            @endif
        </div>             
    </div>
@endsection