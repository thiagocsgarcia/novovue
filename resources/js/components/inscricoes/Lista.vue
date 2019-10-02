<template>
  <div>
    <div class="col-xs-12 col-md-12 panel panel-default">
      <div class="panel-heading alert-dark">
        <h3 class="text-center">Lista de Inscritos</h3>
      </div>
      <div class="panel-body">
        <div class="form-inline col-xs-10 col-md-10 col offset-1">
          <div class="input-group col-xs-10 col-md-10 mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Pesquisar</div>
            </div>
            <input
              v-model="search"
              type="search"
              @keyup="filterData()"
              placeholder="Pesquisar..."
              class="form-control"
            />
          </div>
        </div>

        <table class="table table-light table-bordered table-striped" style="font-size: 0.75rem">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>CPF</th>
              <th>RG</th>
              <th>Curso</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="inscricao in filtered" :key="inscricao.id">
              <td>{{ inscricao.id }}</td>
              <td>
                <router-link :to="{ name: 'inscricoes.ficha', params: { id: inscricao.id } }">
                  {{ inscricao.nome }}
                </router-link>
              </td>
              <td>{{ inscricao.email }}</td>
              <td>{{ inscricao.cpf }}</td>
              <td>{{ inscricao.rg }}</td>
              <td>{{ inscricao.curso_interesse }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    filtered() {
      if (this.search !== '') {
        return this.filterData()
      } else {
        return this.inscricoes
      }
    }
  },
  created () {
    window.axios.get('/inscricoes-cursos')
    .then(response => {
      this.inscricoes = response.data
    })
    .catch(error => {
      console.log(error)
    })
  },
  data () {
    return {
      inscricoes: [],
      search: ''
    }
  },
  methods: {
    filterData() {
      return this.inscricoes.filter(inscricao => {
        for (const key in inscricao) {
          if (inscricao[key] !== null) {
            if (inscricao[key].toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) {
              return true
            }
          }
        }
      })
    }
  }
}
</script>
