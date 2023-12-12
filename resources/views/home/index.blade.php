@extends('layout.app')

@section('title', 'Home')

@section('navbar')
    @include('layout.navbar')       
@endsection

@section('content')
    <div class="">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-4">
                <img src="{{URL('img/logo-ecomente-painel-adm.png')}}" alt="Logo Ecomente">
            </div>                
        </main>
    </div>
@endsection