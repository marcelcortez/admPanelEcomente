@extends('layout.app')

@section('title', 'Editar categoria')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <h2>Editar categoria</h2>
    <br>

    <form method="post" class="" action="{{route('categorias.update', ['categoria' => $categoria])}}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome da categoria" value="{{$categoria->nome}}">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{$categoria->descricao}}">
        </div>

        <div class="mb-3">
            <a class="btn btn-danger" href="{{route('categorias.index')}}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Alterar</button>
        </div>
    </form>
@endsection