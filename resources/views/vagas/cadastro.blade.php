<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body>
        <nav class="navbar navbar-expand navbar-light navbar-laravel">
            <div class="container-fluid">
                <a href="/empresas" class="navbar navbar-brand">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            </div>
        </nav>

        <main id="app" class="py-4">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h2>Cadastro de Vaga</h2>
                        <hr />
                        <form action="#" method="post">
                            <h4>Contratante</h4>
                            <div class="form-group">
                                <input type="text" placeholder="CNPJ" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Nome da Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Nome do Responsavel pela Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="E-mail da Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Telefone da Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Endereço da Empresa" class="form-control"></textarea>
                            </div>

                            <h4>Vaga</h4>

                            <div class="form-group">
                                <input type="text" placeholder="Título da Vaga" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="number" placeholder="Quantidade de vagas" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Descrição da vaga" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Responsável pela Vaga" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Contato do Responsável" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Salário" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Benefícios" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Jornada de Trabalho" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Endereço do local de trabalho" class="form-control"></textarea>
                            </div>

                            <h4>Candidato</h4>

                            <div class="form-group">
                                <select class="form-control">
                                    <option value="" disabled selected>Necessita experiência?</option>
                                    <option value="Não necessita de experiência">Não necessita de experiência</option>
                                    <option value="Sim necessita de experiência">Sim necessita de experiência</option>
                                    <option value="Sim necessita de experiência com comprovação em carteira">Sim necessita de experiência com comprovação em carteira</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="number" placeholder="Quantidade de experiência (meses)" class="form-control" />
                            </div>

                            <div class="form-group">
                                <select class="form-control">
                                    <option value="" disabled selected>Escolaridade Mínima</option>
                                    <option value="Fundamental (DESEJÁVEL)">Fundamental (DESEJÁVEL)</option>
                                    <option value="Fundamental (IMPRESCINDÍVEL)">Fundamental (IMPRESCINDÍVEL)</option>
                                    <option value="Médio (DESEJÁVEL)">Médio (DESEJÁVEL)</option>
                                    <option value="Médio (IMPRESCINDÍVEL)">Médio (IMPRESCINDÍVEL)</option>
                                    <option value="Superior (DESEJÁVEL)">Superior (DESEJÁVEL)</option>
                                    <option value="Superior (IMPRESCINDÍVEL)">Superior (IMPRESCINDÍVEL)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control">
                                    <option value="" disabled selected>Aceita Pessoa com Deficiência?</option>
                                    <option value="Não">Não</option>
                                    <option value="Sim">Sim</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Tipo de Deficiência" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <select class="form-control">
                                    <option value="" disabled selected>Necessita CNH (Carteira Nacional de Habilitação)?</option>
                                    <option value="Não">Não necessita de CNH</option>
                                    <option value="Sim na Categoria A">Sim na Categoria A</option>
                                    <option value="Sim na Categoria B">Sim na Categoria B</option>
                                    <option value="Sim na Categoria C">Sim na Categoria C</option>
                                    <option value="Sim na Categoria D">Sim na Categoria D</option>
                                    <option value="Sim na Categoria E">Sim na Categoria E</option>
                                    <option value="Sim nas Categorias A + B">Sim nas Categorias A + B</option>
                                    <option value="Sim nas Categorias A + C">Sim nas Categorias A + C</option>
                                    <option value="Sim nas Categorias A + D">Sim nas Categorias A + D</option>
                                    <option value="Sim nas Categorias A + E">Sim nas Categorias A + E</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Aceita candidatos de quais cidades?" class="form-control" />
                            </div>

                            <h4>Entrevista</h4>

                            <div class="form-group">
                                <textarea placeholder="Endereço do local de entrevistamento" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Dias de entrevista" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <textarea placeholder="Horários de entrevista" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="number" placeholder="Quantidade MÉDIA de candidatos que deseja entrevistar?" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="number" placeholder="Quantidade de candidatos deseja entrevistar por DIA?" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="number" placeholder="Quantidade de candidatos deseja entrevistar por PERÍODO?" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Nome do selecionador" class="form-control" />
                            </div>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>
