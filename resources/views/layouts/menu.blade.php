<nav class="navbar navbar-expand-lg navbar-dark al-navbar" style="background-color: #070E38">
    <div class="container  ">
        <!--<a class="navbar-brand" href="#">App Truck</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNav"
            aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="primaryNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ url('/') }}">Início <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ url('veiculos/cadastro') }}">Veículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{url('usuarios/relatorio')}}">Ganhos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning"  href="{{url('usuarios/gastos')}}">Gastos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{url('usuarios/cofrinho')}}">Cofrinho Manutenção</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Minha Conta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #070E38">
                        <a class="dropdown-item text-warning" href="{{ url('usuarios/alterarDados') }}"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        <a class="dropdown-item text-warning" href="{{ url('usuarios', ['login']) }}"><i
                                class="fa fa-fw fa-close"></i> Sair</a>
                    </div>
                </li>       
            </ul>
        </div>

    </div>
</nav>
