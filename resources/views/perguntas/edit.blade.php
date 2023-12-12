@extends('layout.app')

@section('title', 'Editar Pergunta')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <div class="ms-2">
        <h1 class="page-title">Editar Pergunta</h1>

        <form method="post" action="{{route('perguntas.update', ['pergunta' => $pergunta])}}" class="container border border-success rounded pt-2">
        @csrf
            @method('put')

            <div class="mb-3">
                <label for="categorias_id" class="form-label">Categoria</label>
                <select class="form-select caixaSelecao" name="categorias_id" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $pergunta->categorias_id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                    <!-- Opções de categorias devem ser preenchidas dinamicamente -->
                    {{-- Exemplo de opção --}}
                    {{-- <option value="1">Categoria 1</option> --}}
                </select>
            </div>

            <div class="mb-3">
                <label for="pergunta" class="form-label">Pergunta</label>
                <textarea class="form-control pergunta" name="pergunta" rows="3" required>{{ $pergunta->pergunta }}</textarea>
            </div>

            <div class="mb3">
                <div class="row">
                    <div class="col mb-3">
                        <label for="alternativa1" class="form-label">Alternativa 1</label>
                        <input type="text" class="form-control" name="alternativa1" value="{{$pergunta->alternativa1}}" required>
                    </div>
            
                    <div class="col mb-3">
                        <label for="alternativa2" class="form-label">Alternativa 2</label>
                        <input type="text" class="form-control" name="alternativa2" value="{{$pergunta->alternativa2}}" required>
                    </div>
            
                    <div class="col mb-3">
                        <label for="alternativa3" class="form-label">Alternativa 3</label>
                        <input type="text" class="form-control" name="alternativa3" value="{{$pergunta->alternativa3}}" required>
                    </div>
            
                    <div class="col mb-3">
                        <label for="alternativa4" class="form-label">Alternativa 4</label>
                        <input type="text" class="form-control" name="alternativa4" value="{{$pergunta->alternativa4}}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="respostaCorreta" class="form-label">Alternativa Correta</label>
                    <select class="form-select" name="respostaCorreta" value="{{$pergunta->respostaCorreta}}" required>
                        <option value="1">Alternativa 1</option>
                        <option value="2">Alternativa 2</option>
                        <option value="3">Alternativa 3</option>
                        <option value="4">Alternativa 4</option>
                    </select>
                </div>
        
                <div class="col mb-3">
                    <label for="dificuldade" class="form-label">Dificuldade</label>
                    <select class="form-select" name="dificuldade" required>
                        <option value="1" {{ $pergunta->dificuldade == 1 ? 'selected' : '' }}>Fácil</option>
                        <option value="2" {{ $pergunta->dificuldade == 2 ? 'selected' : '' }}>Médio</option>
                        <option value="3" {{ $pergunta->dificuldade == 3 ? 'selected' : '' }}>Difícil</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <a class="btn btn-danger" href="{{route('perguntas.index')}}">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
@endsection
