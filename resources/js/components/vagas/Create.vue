<template>
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Cadastro de Vaga</h2>
        <router-link :to="{ name: 'vagas.index' }" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i>
          Voltar
        </router-link>
      </div>

      <hr />
      <form action="#" method="post" @submit.prevent="create">
        <h4>Contratante</h4>

        <div class="form-group">
          <select class="form-control" v-model="vaga.empresa_id">
            <option value="" disabled selected>Selecione a Empresa</option>
            <option :value="empresa.id" v-for="empresa in empresas" :key="empresa.id"
              >{{ empresa.nome_fantasia }} - {{ empresa.razao_social }}
            </option>
          </select>
        </div>

        <h4>Vaga</h4>

        <div class="form-group">
          <input
            type="text"
            placeholder="Título da Vaga"
            class="form-control"
            v-model="vaga.vaga"
          />
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de vagas"
            class="form-control"
            v-model="vaga.quantidade"
          />
        </div>

        <div class="form-group">
          <textarea
            placeholder="Descrição da vaga"
            class="form-control"
            v-model="vaga.descricao"
          ></textarea>
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Responsável pela Vaga"
            class="form-control"
            v-model="vaga.responsavel"
          />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Contato do Responsável"
            class="form-control"
            v-model="vaga.telefone"
          />
        </div>

        <div class="form-group">
          <input type="text" placeholder="Salário" class="form-control" v-model="vaga.salario" />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Benefícios"
            class="form-control"
            v-model="vaga.beneficios"
          />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Jornada de Trabalho"
            class="form-control"
            v-model="vaga.jornada"
          />
        </div>

        <div class="form-group">
          <textarea
            placeholder="Endereço do local de trabalho"
            class="form-control"
            v-model="vaga.endereco_trabalho"
          ></textarea>
        </div>

        <h4>Candidato</h4>

        <div class="form-group">
          <select class="form-control" v-model="vaga.experiencia">
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
            v-model="vaga.qtd_experiencia"
          />
        </div>

        <div class="form-group">
          <select class="form-control" v-model="vaga.escolaridade">
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
          <select class="form-control" v-model="vaga.pcd">
            <option value="" disabled selected>Aceita Pessoa com Deficiência?</option>
            <option value="Não">Não</option>
            <option value="Sim">Sim</option>
          </select>
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Tipo de Deficiência"
            class="form-control"
            v-model="vaga.deficiencia"
          />
        </div>

        <div class="form-group">
          <select class="form-control" v-model="vaga.cnh">
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
            v-model="vaga.cidades"
          />
        </div>

        <h4>Entrevista</h4>

        <div class="form-group">
          <textarea
            placeholder="Endereço do local de entrevistamento"
            class="form-control"
            v-model="vaga.endereco_entrevista"
          ></textarea>
        </div>

        <div class="form-group">
          <textarea
            placeholder="Dias de entrevista"
            class="form-control"
            v-model="vaga.dias_entrevista"
          ></textarea>
        </div>

        <div class="form-group">
          <textarea
            placeholder="Horários de entrevista"
            class="form-control"
            v-model="vaga.horarios_entrevista"
          ></textarea>
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade MÉDIA de candidatos que deseja entrevistar?"
            class="form-control"
            v-model="vaga.qtd_candidatos"
          />
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de candidatos deseja entrevistar por DIA?"
            class="form-control"
            v-model="vaga.qtd_candidatos_dias"
          />
        </div>

        <div class="form-group">
          <input
            type="number"
            placeholder="Quantidade de candidatos deseja entrevistar por PERÍODO?"
            class="form-control"
            v-model="vaga.qtd_candidatos_periodo"
          />
        </div>

        <div class="form-group">
          <input
            type="text"
            placeholder="Nome do selecionador"
            class="form-control"
            v-model="vaga.selecionador"
          />
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    axios.get('api/v1/empresas').then(response => {
      this.empresas = response.data.empresas
    })
  },
  data() {
    return {
      empresas: [],
      vaga: {
        empresa_id: '',
        vaga: '',
        descricao: '',
        quantidade: '',
        responsavel: '',
        telefone: '',
        experiencia: '',
        qtd_experiencia: '',
        escolaridade: '',
        pcd: '',
        deficiencia: '',
        cnh: '',
        salario: '',
        beneficios: '',
        jornada: '',
        endereco_trabalho: '',
        cidades: '',
        qtd_candidatos: '',
        endereco_entrevista: '',
        dias_entrevista: '',
        horarios_entrevista: '',
        qtd_candidatos_dias: '',
        qtd_candidatos_periodo: '',
        selecionador: ''
      }
    }
  },
  methods: {
    create() {
      axios
        .post('api/v1/vagas', this.vaga)
        .then(response => {
          if (response.status === 201) {
            swal({
              title: 'Cadastro realizado!',
              icon: 'success'
            })

            this.$router.push({ name: 'vagas.index' })
          } else {
            swal({
              title: 'Não foi possivel realizar o cadastro!',
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
