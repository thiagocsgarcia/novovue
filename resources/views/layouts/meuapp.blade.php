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
        <div id="app">
            <header id="headerpmsv">
                <div id="logo1">
                    <img src="{{ asset('img/logo2-01.png') }}" alt="logo feira de oportunidades">
                </div>
                <div id="textcenter">
                    <h2>Segunda Feira de Oportunidades - Admin</h2>
                    <p>São Vicente - SP</p>
                </div>
                <div class="greybox">
                    <p id="paddingr"> Seja Bem-vindo(a)
                    <br> Aqui você Cadastra e Pesquisa Vagas e Empresas</p>
                </div>
                <div id="logolink0">
                    <a target="_blank" href="http://www.saovicente.sp.gov.br/publico/">
                        <img src="{{ asset('img/LogoPMSV-01.png') }}" alt="logo pmsv">
                    </a>
                </div>
                <div id="logolink2">
                    <a target="_blank" href="https://www.facebook.com/Secretaria-de-Desenvolvimento-Econ%C3%B4mico-e-Tecnologia-de-S%C3%A3o-Vicente-1147254042064190/">
                        <img src="{{ asset('img/sedectlogo-01.png') }}" alt="logo sedect">
                    </a>
                </div>
            </header>
            <nav class="navbar navbar-expand navbar-light navbar-laravel">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMain">
                    <!--ul class="navbar-nav">
                        <li id="menu1"><a href="">EMPRESAS</a></li>
                        <li id="menu2"><a href="">VAGAS</a></li>
                    </ul-->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
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
                @yield('content')
            </main>
            <footer id="menuBSdemand2">
                <div>
                    R. José Bonifácio, 404 - Centro, São Vicente - SP, 11310-080
                    <a href="https://www.facebook.com/Secretaria-de-Desenvolvimento-Econ%C3%B4mico-e-Tecnologia-de-S%C3%A3o-Vicente-1147254042064190/" target="_blank">DITEC - SEDECT</a>.
                    <br>
                    Dúvidas sobre o sistema? Ligue: 3569-2376 - DITEC, att. Felipe, Marcus e Thiago.
                </div>
            </footer>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
