@extends('layout.app')

@section('title', 'Usuários')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <h2 class="page-title">Lista de Usuários</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3 mb-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at }}</td>
                    <td>
                        <p>Administrador</p>
                        @if($usuario->id != 1)
                            <form action="{{ route('usuario.delete', $usuario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <a href="{{route('usuario.create')}}" class="btn btn-success">Adicionar</a>
    </div>
@endsection