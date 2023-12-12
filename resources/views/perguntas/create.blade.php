@extends('layout.app')

@section('title', 'Home')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <div class="ms-2">
        <h1 class="page-title">Adicionar Pergunta</h1>

        <form method="post" action="{{route('perguntas.save')}}" class="container border border-success rounded pt-2">
            @csrf
            @method('post')

            <div class="mb-3">
                <label for="categorias_id" class="form-label">Categoria</label>
                <select class="form-select" name="categorias_id" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                    <!-- Opções de categorias devem ser preenchidas dinamicamente -->
                    {{-- Exemplo de opção --}}
                    {{-- <option value="1">Categoria 1</option> --}}
                </select>
            </div>

            <div class="mb-3">
                <label for="pergunta" class="form-label">Pergunta</label>
                <textarea class="form-control" name="pergunta" rows="3" required></textarea>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="alternativa1" class="form-label">Alternativa 1</label>
                    <input type="text" class="form-control" name="alternativa1" required>
                </div>
    
                <div class="col mb-3">
                    <label for="alternativa2" class="form-label">Alternativa 2</label>
                    <input type="text" class="form-control" name="alternativa2" required>
                </div>
    
                <div class="col mb-3">
                    <label for="alternativa3" class="form-label">Alternativa 3</label>
                    <input type="text" class="form-control" name="alternativa3" required>
                </div>
    
                <div class="col mb-3">
                    <label for="alternativa4" class="form-label">Alternativa 4</label>
                    <input type="text" class="form-control" name="alternativa4" required>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="respostaCorreta" class="form-label">Alternativa Correta</label>
                    <select class="form-select" name="respostaCorreta" required>
                        <option value="1">Alternativa 1</option>
                        <option value="2">Alternativa 2</option>
                        <option value="3">Alternativa 3</option>
                        <option value="4">Alternativa 4</option>
                    </select>
                </div>
    
                <div class="col mb-3">
                    <label for="dificuldade" class="form-label">Dificuldade</label>
                    <select class="form-select" name="dificuldade" required>
                        <option value="1">Fácil</option>
                        <option value="2">Médio</option>
                        <option value="3">Difícil</option>
                    </select>
                </div>
            </div>

            <div class="text-center mt-2 mb-2">
                <a class="me-1 btn btn-danger" href="{{route('perguntas.index')}}">Cancelar</a>
                <button type="submit" class="ms-1 btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
@endsection