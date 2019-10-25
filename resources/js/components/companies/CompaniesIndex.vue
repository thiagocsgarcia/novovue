
<template>
  <div>
    <div class="col-xs-12 col-md-12 panel panel-default">
      <div class="panel-heading alert-dark">
        <h3 class="text-center">Lista de Empresas</h3>
      </div>
      <div class="panel-body">
        <div class="form-inline col-xs-10 col-md-10 col offset-1">
          <router-link :to="{ name: 'criarEmpresa' }" class="btn btn-success mb-2">Nova Empresa</router-link>
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

        <table class="table table-light table-bordered table-striped" style="font-size: 0.6rem">
          <thead class="thead-dark">
            <tr class="text-center">
              <th>Nome Fantasia</th>
              <th>CNPJ</th>
              <th>Razão Social</th>
              <th>Email</th>
              <th>Telefone</th>
              <th colspan="3">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="empresa in filtered" :key="empresa.id">
              <td>{{ empresa.nome_fantasia }}</td>
              <td class="text-center">{{ empresa.cnpj }}</td>
              <td>{{ empresa.razao_social }}</td>
              <td>{{ empresa.email }}</td>
              <td>{{ empresa.telefone }}</td>
              <td class="text-center">
                <router-link :to="{ name: 'editarEmpresa', params: { id: empresa.id } }" class="btn btn-sm btn-outline-warning">Editar</router-link>
              </td>
              <td>
                <button @click="excluir(empresa)" class="btn btn-sm btn-outline-danger">Deletar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created () {
    window.axios.get('/empresas')
    .then(response => {
      this.empresas = response.data
    })
    .catch(error => {
      swal({
        title: 'Não foi possivel carregar os dados',
        text: error,
        icon: 'error'
      })
    })
  },
  computed: {
    filtered() {
      if (this.search !== '') {
        return this.filterData()
      } else {
        return this.empresas
      }
    }
  },
  data () {
    return {
      empresas: [],
      search: '',
    }
  },
  methods: {
    excluir (empresa) {
      swal({
        title: 'Atenção',
        text: 'Após excluído as informações não poderão ser recuperadas. Deseja realmente excluir?',
        icon: 'warning',
        buttons: true,
        dangerMode: true
      })
      .then(result => {
        if (result) {
          this.handlerDelete(empresa)
        }
      })
    },
    filterData () {
      return this.empresas.filter(empresa => {
        for (const key in empresa) {
          if (empresa[key] !== null) {
            if (empresa[key].toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) {
              return true
            }
          }
        }
      })
    },
    handlerDelete (empresa) {
      window.axios.delete(`/empresas/${empresa.id}`)
      .then(response => {

      }).catch(error => {

      })
    }
  }
}
</script>
