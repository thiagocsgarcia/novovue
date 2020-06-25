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
                        <form id="form" action="/empresas/vagas" method="post">
                            <h4>Contratante</h4>

                            <div class="form-group">
                                <input type="text" id="empresa_cnpj" placeholder="CNPJ" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="empresa_nome" placeholder="Nome da Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="empresa_responsavel" placeholder="Nome do Responsavel pela Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="empresa_email" placeholder="E-mail da Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="empresa_telefone" placeholder="Telefone da Empresa" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea id="empresa_endereco" placeholder="Endereço da Empresa" class="form-control"></textarea>
                            </div>

                            <h4>Vaga</h4>

                            <div class="form-group">
                                <input type="text" id="vaga_titulo" placeholder="Título da Vaga" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="number" id="vaga_quantidade" placeholder="Quantidade de vagas" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea id="vaga_descricao" placeholder="Descrição da vaga" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" id="vaga_salario" placeholder="Salário" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="vaga_beneficios" placeholder="Benefícios" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="vaga_jornada" placeholder="Jornada de Trabalho" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea id="vaga_endereco_trabalho" placeholder="Endereço do local de trabalho" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" id="vaga_responsavel" placeholder="Responsável pela Vaga" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="vaga_contato_responsavel" placeholder="Contato do Responsável" class="form-control" />
                            </div>

                            <h4>Candidato</h4>

                            <div class="form-group">
                                <select id="candidato_experiencia" class="form-control">
                                    <option value="" disabled selected>Necessita experiência?</option>
                                    <option value="Não necessita de experiência">Não necessita de experiência</option>
                                    <option value="Sim necessita de experiência">Sim necessita de experiência</option>
                                    <option value="Sim necessita de experiência com comprovação em carteira">Sim necessita de experiência com comprovação em carteira</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="number" id="candidato_qtd_experiencia" placeholder="Quantidade de experiência (meses)" class="form-control" />
                            </div>

                            <div class="form-group">
                                <select id="candidato_escolaridade" class="form-control">
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
                                <select id="candidato_pcd" class="form-control">
                                    <option value="" disabled selected>Aceita Pessoa com Deficiência?</option>
                                    <option value="Não, aceita pessoa com deficiência.">Não</option>
                                    <option value="Sim, aceita pessoa com deficiência.">Sim</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" id="candidato_deficiencia" placeholder="Tipo de Deficiência" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <select id="candidato_cnh" class="form-control">
                                    <option value="" disabled selected>Necessita CNH (Carteira Nacional de Habilitação)?</option>
                                    <option value="Não, necessita de CNH">Não necessita de CNH</option>
                                    <option value="Sim CNH na Categoria A">Sim CNH na Categoria A</option>
                                    <option value="Sim CNH na Categoria B">Sim CNH na Categoria B</option>
                                    <option value="Sim CNH na Categoria C">Sim CNH na Categoria C</option>
                                    <option value="Sim CNH na Categoria D">Sim CNH na Categoria D</option>
                                    <option value="Sim CNH na Categoria E">Sim CNH na Categoria E</option>
                                    <option value="Sim CNH nas Categorias A + B">Sim CNH nas Categorias A + B</option>
                                    <option value="Sim CNH nas Categorias A + C">Sim CNH nas Categorias A + C</option>
                                    <option value="Sim CNH nas Categorias A + D">Sim CNH nas Categorias A + D</option>
                                    <option value="Sim CNH nas Categorias A + E">Sim CNH nas Categorias A + E</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" id="candidato_cidades" placeholder="Aceita candidatos de quais cidades?" class="form-control" />
                            </div>

                            <h4>Entrevista</h4>

                            <div class="form-group">
                                <textarea id="entrevista_endereco" placeholder="Endereço do local de entrevistamento" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <textarea id="entrevista_datas" placeholder="Dias de entrevista" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <textarea id="entrevista_horarios" placeholder="Horários de entrevista" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="number" id="entrevista_qtd_candidatos" placeholder="Quantidade MÉDIA de candidatos que deseja entrevistar?" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="number" id="entrevista_qtd_dia" placeholder="Quantidade de candidatos deseja entrevistar por DIA?" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="number" id="entrevista_qtd_periodos" placeholder="Quantidade de candidatos deseja entrevistar por PERÍODO?" class="form-control" />
                            </div>

                            <div class="form-group">
                                <input type="text" id="entrevista_selecionador" placeholder="Nome do selecionador" class="form-control" />
                            </div>

                            <div class="offset-md-9 col-md-3 form-group">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const form = document.getElementById('form');

            form.addEventListener('submit', (event) => {
                event.preventDefault()
                let vaga = {
                    empresa_id: 862,
                    empresa_cnpj: document.getElementById('empresa_cnpj').value,
                    empresa_nome: document.getElementById('empresa_nome').value,
                    empresa_responsavel: document.getElementById('empresa_responsavel').value,
                    empresa_email: document.getElementById('empresa_email').value,
                    empresa_telefone: document.getElementById('empresa_telefone').value,
                    empresa_endereco: document.getElementById('empresa_endereco').value,

                    vaga_titulo: document.getElementById('vaga_titulo').value,
                    vaga_quantidade: document.getElementById('vaga_quantidade').value,
                    vaga_descricao: document.getElementById('vaga_descricao').value,
                    vaga_salario: document.getElementById('vaga_salario').value,
                    vaga_beneficios: document.getElementById('vaga_beneficios').value,
                    vaga_jornada: document.getElementById('vaga_jornada').value,
                    vaga_endereco_trabalho: document.getElementById('vaga_endereco_trabalho').value,
                    vaga_responsavel: document.getElementById('vaga_responsavel').value,
                    vaga_contato_responsavel: document.getElementById('vaga_contato_responsavel').value,

                    candidato_experiencia: document.getElementById('candidato_experiencia').value,
                    candidato_qtd_experiencia: document.getElementById('candidato_qtd_experiencia').value,
                    candidato_escolaridade: document.getElementById('candidato_escolaridade').value,
                    candidato_pcd: document.getElementById('candidato_pcd').value,
                    candidato_deficiencia: document.getElementById('candidato_deficiencia').value,
                    candidato_cnh: document.getElementById('candidato_cnh').value,
                    candidato_cidades: document.getElementById('candidato_cidades').value,

                    entrevista_endereco: document.getElementById('entrevista_endereco').value,
                    entrevista_datas: document.getElementById('entrevista_datas').value,
                    entrevista_horarios: document.getElementById('entrevista_horarios').value,
                    entrevista_qtd_candidatos: document.getElementById('entrevista_qtd_candidatos').value,
                    entrevista_qtd_dia: document.getElementById('entrevista_qtd_dia').value,
                    entrevista_qtd_periodos: document.getElementById('entrevista_qtd_periodos').value,
                    entrevista_selecionador: document.getElementById('entrevista_selecionador').value,
                }

                axios.post('/empresas/vagas', vaga).then(response => {
                    if (response.status === 201) {
                        swal({title: 'Cadastro realizado!', icon: 'success'})
                        form.reset();
                    } else {
                        swal({title: 'Não foi possivel realizar o cadastro!', icon: 'error'})
                    }
                }).catch(response => {
                    console.log(response.error)
                })
            })
        </script>
    </body>
</html>
