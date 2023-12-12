@extends('layout.app')

@section('title', 'Categorias')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <h1 class="page-title">Categorias</h1>

    @if(session('success'))
        <div class="alert alert-success mt-3 mb-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
        
    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nome}}</td>
                        <td>{{$categoria->descricao}}</td>
                        <td>
                            <a href="{{route('categorias.edit', ['categoria' => $categoria])}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('categorias.delete', ['categoria' => $categoria])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{route('categorias.create')}}" class="btn btn-success">Adicionar</a>
    </div>

@endsection
