@extends('layout.app')

@section('title', 'Adicionar categoria')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <h2>Adicionar nova categoria</h2>
    <br>

    <form method="post" action="{{route('categorias.save')}}">
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome da categoria">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="Descrição">
        </div>

        <div class="mb-3">
            <a class="btn btn-danger" href="{{route('categorias.index')}}">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection
