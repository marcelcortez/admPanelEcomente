@extends('layout.app')

@section('title', 'Adicionar usuário')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')

<h2>Cadastro de Usuário</h2>

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('usuario.save') }}" class="w-50">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirme a Senha</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <div class="mt-4 mb-3">
        <a class="btn btn-danger me-4" href="{{route('usuario.index')}}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>


@endsection