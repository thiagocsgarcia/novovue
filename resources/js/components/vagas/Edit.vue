<template>
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Edição de Vaga</h2>
        <router-link :to="{ name: 'vagas.index' }" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i>
          Voltar
        </router-link>
      </div>

      <hr />
      <form action="#" method="post" @submit.prevent="update">
        <h4>Contratante</h4>

        <div class="form-group">
          <select class="form-control" v-model="vaga.empresa_id" @change="empresa">
            <option value="" disabled selected>Selecione a Empresa</option>
            <option :value="empresa.id" v-for="empresa in empresas" :key="empresa.id"
              >{{ empresa.nome_fantasia }} - {{ empresa.razao_social }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <input type="text" readonly placeholder="CNPJ" class="form-control" v-model="vaga.empresa_cnpj" />
        </div>

        <div class="form-group">
          <input type="text" readonly placeholder="Nome da Empresa" class="form-control" v-model="vaga.empresa_nome" />
        </div>

        <div class="form-group">
          <input type="text" readonly placeholder="Nome do Responsavel pela Empresa" class="form-control" v-model="vaga.empresa_responsavel" />
        </div>

        <div class="form-group">
          <input type="text" readonly placeholder="E-mail da Empresa" class="form-control" v-model="vaga.empresa_email" />
        </div>

        <div class="form-group">
          <input type="text" readonly placeholder="Telefone da Empresa" class="form-control" v-model="vaga.empresa_telefone" />
        </div>

        <div class="form-group">
          <textarea readonly placeholder="Endereço da Empresa" class="form-control" v-model="vaga.empresa_endereco"></textarea>
        </div>

        <h4>Vaga</h4>

        <div class="form-group">
          <input
            type="text"
            placeholder="Título da Vaga"
            class="form-control"
            v-model="vaga.vaga_titulo"
          />
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de vagas"
            class="form-control"
            v-model="vaga.vaga_quantidade"
          />
        </div>

        <div class="form-group">
          <textarea
            placeholder="Descrição da vaga"
            class="form-control"
            v-model="vaga.vaga_descricao"
          ></textarea>
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Responsável pela Vaga"
            class="form-control"
            v-model="vaga.vaga_responsavel"
          />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Contato do Responsável"
            class="form-control"
            v-model="vaga.vaga_contato_responsavel"
          />
        </div>

        <div class="form-group">
          <input type="text" placeholder="Salário" class="form-control" v-model="vaga.vaga_salario" />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Benefícios"
            class="form-control"
            v-model="vaga.vaga_beneficios"
          />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Jornada de Trabalho"
            class="form-control"
            v-model="vaga.vaga_jornada"
          />
        </div>

        <div class="form-group">
          <textarea
            placeholder="Endereço do local de trabalho"
            class="form-control"
            v-model="vaga.vaga_endereco_trabalho"
          ></textarea>
        </div>

        <h4>Candidato</h4>

        <div class="form-group">
          <select class="form-control" v-model="vaga.candidato_experiencia">
            <option value="" disabled selected>Necessita experiência?</option>
            <option value="Não necessita de experiência">Não necessita de experiência</option>
            <option value="Sim necessita de experiência">Sim necessita de experiência</option>
            <option value="Sim necessita de experiência com comprovação em carteira"
              >Sim necessita de experiência com comprovação em carteira</option
            >
          </select>
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de experiência (meses)"
            class="form-control"
            v-model="vaga.candidato_qtd_experiencia"
          />
        </div>

        <div class="form-group">
          <select class="form-control" v-model="vaga.candidato_escolaridade">
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
          <select class="form-control" v-model="vaga.candidato_pcd">
            <option value="" disabled selected>Aceita Pessoa com Deficiência?</option>
            <option value="Não, aceita candidato com deficiência">Não</option>
            <option value="Sim, aceita candidato com deficiência">Sim</option>
          </select>
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Tipo de Deficiência"
            class="form-control"
            v-model="vaga.candidato_deficiencia"
          />
        </div>

        <div class="form-group">
          <select class="form-control" v-model="vaga.candidato_cnh">
            <option value="" disabled selected
              >Necessita CNH (Carteira Nacional de Habilitação)?</option
            >
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
          <input
            type="text"
            placeholder="Aceita candidatos de quais cidades?"
            class="form-control"
            v-model="vaga.candidato_cidades"
          />
        </div>

        <h4>Entrevista</h4>

        <div class="form-group">
          <textarea
            placeholder="Endereço do local de entrevistamento"
            class="form-control"
            v-model="vaga.entrevista_endereco"
          ></textarea>
        </div>

        <div class="form-group">
          <textarea
            placeholder="Dias de entrevista"
            class="form-control"
            v-model="vaga.entrevista_datas"
          ></textarea>
        </div>

        <div class="form-group">
          <textarea
            placeholder="Horários de entrevista"
            class="form-control"
            v-model="vaga.entrevista_horarios"
          ></textarea>
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade MÉDIA de candidatos que deseja entrevistar?"
            class="form-control"
            v-model="vaga.entrevista_qtd_candidatos"
          />
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de candidatos deseja entrevistar por DIA?"
            class="form-control"
            v-model="vaga.entrevista_qtd_dia"
          />
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de candidatos deseja entrevistar por PERÍODO?"
            class="form-control"
            v-model="vaga.entrevista_qtd_periodos"
          />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Nome do selecionador"
            class="form-control"
            v-model="vaga.entrevista_selecionador"
          />
        </div>

        <div class="offset-md-9 col-md-3 form-group">
          <button type="submit" class="btn btn-lg btn-block btn-warning">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    let id = this.$route.params.id

    axios.get(`api/v1/vagas/${id}`).then(response => {
      this.vaga = response.data.vaga
    })

    axios.get('api/v1/empresas').then(response => {
      this.empresas = response.data.empresas
    })
  },
  data() {
    return {
      empresas: [],
      vaga: {
        empresa_id: '',
        empresa_cnpj: '',
        empresa_nome: '',
        empresa_responsavel: '',
        empresa_email: '',
        empresa_telefone: '',
        empresa_endereco: '',

        vaga_titulo: '',
        vaga_quantidade: '',
        vaga_descricao: '',
        vaga_salario: '',
        vaga_beneficios: '',
        vaga_jornada: '',
        vaga_endereco_trabalho: '',
        vaga_responsavel: '',
        vaga_contato_responsavel: '',

        candidato_experiencia: '',
        candidato_qtd_experiencia: '',
        candidato_escolaridade: '',
        candidato_pcd: '',
        candidato_deficiencia: '',
        candidato_cnh: '',
        candidato_cidades: '',

        entrevista_endereco: '',
        entrevista_datas: '',
        entrevista_horarios: '',
        entrevista_qtd_candidatos: '',
        entrevista_qtd_dia: '',
        entrevista_qtd_periodos: '',
        entrevista_selecionador: ''
      }
    }
  },
  methods: {
    empresa() {
      if (this.vaga.empresa_id !== undefined) {
        let empresa = this.empresas.find(empresa => empresa.id == this.vaga.empresa_id)

        this.vaga.empresa_cnpj = empresa.cnpj
        this.vaga.empresa_nome = `${empresa.nome_fantasia} (${empresa.razao_social})`
        this.vaga.empresa_responsavel = empresa.contato
        this.vaga.empresa_email = empresa.email
        this.vaga.empresa_telefone = `${empresa.telefone}, ${empresa.telefone2}, ${empresa.celular}`
        this.vaga.empresa_endereco = `${empresa.endereco}, ${empresa.bairro}, ${empresa.cidade}, ${empresa.cep}`
      } else {
        this.vaga.empresa_cnpj = ''
        this.vaga.empresa_nome = ''
        this.vaga.empresa_responsavel = ''
        this.vaga.empresa_email = ''
        this.vaga.empresa_telefone = ''
        this.vaga.empresa_endereco = ''
      }
    },
    update() {
      axios
        .put(`api/v1/vagas/${this.vaga.id}`, this.vaga)
        .then(response => {
          if (response.status === 202) {
            swal({
              title: 'Alterações salvas!',
              icon: 'success'
            })
            this.$router.push({ name: 'vagas.index' })
          } else {
            swal({
              title: 'Não foi possivel salvar as alterações.',
              icon: 'error'
            })
          }
        })
        .catch(error => {
          console.log(error.response)
        })
    }
  }
}
</script>
