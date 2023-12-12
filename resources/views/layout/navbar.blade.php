
<!-- Painel de Navegação Lateral -->
<nav class="vh-100 mr-3" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <!-- Logomarca -->
        <img src="{{URL('Img/logo-ecomente-quiz-white.png')}}" style="width: 160px; height: 160px;">
        
        <!-- Usuário Logado -->
        <div class="text-start">
            <p class="mt-2">Nome: {{auth()->user()->name}}</p>
            <p>Email: {{auth()->user()->email}}</p>
        </div>
        
    </div>

    <hr class="hr">

    <div class="list-group list-group-flush">
        <!-- Opções de Navegação -->
        <a href="{{route('home.index')}}" class="list-group-item list-group-item-action bg-transparent border border-0">
            <i class="bi bi-house-fill"></i> Home
        </a>

        <a href="{{route('categorias.index')}}" class="list-group-item list-group-item-action bg-transparent border border-0">
            <i class="bi bi-boxes"></i> Categorias
        </a>
        <a href="{{route('perguntas.index')}}" class="list-group-item list-group-item-action bg-transparent border border-0">
            <i class="bi bi-patch-question-fill"></i> Perguntas
        </a>
        <a href="{{route('ranking.index')}}" class="list-group-item list-group-item-action bg-transparent border border-0">
            <i class="bi bi-bar-chart-line"></i> Ranking
        </a>
        <a href="{{route('usuario.index')}}" class="list-group-item list-group-item-action bg-transparent border border-0">
            <i class="bi bi-person"></i> Usuários
        </a>

        <hr class="hr">
        
        <!-- Opção para Sair -->

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            @method('post')
            <button type="submit" class="list-group-item list-group-item-action bg-transparent border border-0 fw-bold"><i class="bi bi-box-arrow-right"></i> Sair </button>
        </form>
    </div>
</nav>