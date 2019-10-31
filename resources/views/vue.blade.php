<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <div id="tudo">
        <header id="headerpmsv" class="pt-3 d-print-none">
            <div class="row">
                <div id="logo1" class="col-1">
                    <img class="img-fluid" src="{{ asset('img/sedect_alta.png') }}" alt="logo feira de oportunidades">
                </div>
                <div id="textcenter" class="col-9">
                    <h2>Secretaria de Desenvolvimento Econômico, Ciência, Tecnologia e Relações do Trabalho</h2>
                    <p>São Vicente - SP</p>
                </div>
            </div>

            <div class="row">
                <div class="greybox">
                    <p id="paddingr">Seja Bem-vindo(a)
                        <br> Aqui você encontra serviços essenciais disponibilizados pela Prefeitura de São Vicente
                        através da SEDECT</p>
                </div>
                <div id="logolink0">
                    <a target="_blank" href="http://www.saovicente.sp.gov.br/publico/">
                        <img src="{{ asset('img/LogoPMSV-01.png') }}" alt="logo pmsv">
                    </a>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand navbar-light navbar-laravel d-print-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/empresas/#/admin/empresas">EMPRESAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/empresas/#/admin/inscricoes-cursos">INSCRIÇÕES NOS CURSOS</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                        @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="app"></div>
                    </div>
                </div>
            </div>
        </main>

        <footer id="menuBSdemand2" class="d-print-none">
            <div>
                R. José Bonifácio, 404 - Centro, São Vicente - SP, 11310-080
                <a href="https://www.facebook.com/Secretaria-de-Desenvolvimento-Econ%C3%B4mico-e-Tecnologia-de-S%C3%A3o-Vicente-1147254042064190/"
                    target="_blank">DITEC - SEDECT</a>.
                <br>
                Dúvidas sobre o sistema? Ligue: 3569-2376 - DITEC, att. Felipe, Marcus e Thiago.
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
