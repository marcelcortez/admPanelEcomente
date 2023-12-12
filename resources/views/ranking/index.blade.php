@extends('layout.app')

@section('title', 'Ranking')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <div class="row">
        <h1 class=" col page-title text-start">Ranking</h1>
        <div class="col content divLimpRkn">            
            <a class="btn btn-danger text-end limparRankingBtn" href="{{route('excluir.todos')}}">Limpar Ranking</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Pontuação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jogadores as $jogador)
            <tr>
                <th scope="row">{{ $jogador->colocacao }}</th>
                <td>{{ $jogador->nome }}</td>
                <td>{{ $jogador->pontuacao }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection