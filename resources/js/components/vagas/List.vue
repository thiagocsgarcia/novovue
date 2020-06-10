<template>
  <div class="card">
    <div class="card-body">
      <h2 class="text-center py-3">Lista de Vagas</h2>

      <hr />

      <div class="d-flex justify-content-center align-items-center mb-4">
        <div class="input-group col-md-8">
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

        <router-link :to="{ name: 'vagas.create' }" class="btn btn-primary">
          <i class="fas fa-plus"></i> Nova Vaga
        </router-link>
      </div>

      <h1 class="text-center" v-if="empresas.length == 0">Carregando as informações...</h1>

      <table class="table table-bordered table-striped" v-else>
        <thead class="thead-dark">
          <tr class="text-center">
            <th>Vaga</th>
            <th>Quantidade</th>
            <th>Empresa</th>
            <th colspan="3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="vaga in filtered" :key="vaga.id">
            <td>{{ vaga.vaga }}</td>
            <td>{{ vaga.quantidade }}</td>
            <td>{{ empresaName(vaga.empresa_id) }}</td>
            <td class="text-center">
              <router-link
                :to="{ name: 'vagas.show', params: { id: vaga.id } }"
                class="btn btn-sm btn-success"
              >
                <i class="fas fa-eye"></i>
              </router-link>
            </td>
            <td class="text-center">
              <router-link
                :to="{ name: 'vagas.edit', params: { id: vaga.id } }"
                class="btn btn-sm btn-warning"
              >
                <i class="fas fa-pencil-alt"></i>
              </router-link>
            </td>
            <td>
              <button @click="excluir(vaga)" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    axios.get('api/v1/empresas').then(response => {
      this.empresas = response.data.empresas
    })

    axios
      .get('api/v1/vagas')
      .then(response => {
        if (response.status === 200) {
          this.vagas = response.data.vagas
        } else {
          swal({
            title: 'Não foi possivel carregar os dados',
            icon: 'error'
          })
        }
      })
      .catch(error => {
        console.error(error.response)
      })
  },
  computed: {
    filtered() {
      if (this.search !== '') {
        return this.filterData()
      } else {
        return this.vagas
      }
    }
  },
  data() {
    return {
      empresas: [],
      vagas: [],
      search: ''
    }
  },
  methods: {
    empresaName(id) {
      let empresa = this.empresas.find(empresa => empresa.id == id)
      return `${empresa.razao_social} - ${empresa.nome_fantasia}`
    },
    excluir(vaga) {
      swal({
        title: 'Atenção',
        text: 'Após excluído as informações não poderão ser recuperadas. Deseja realmente excluir?',
        icon: 'warning',
        buttons: true,
        dangerMode: true
      }).then(result => {
        if (result) {
          this.handlerDelete(vaga)
        }
      })
    },
    filterData() {
      return this.vagas.filter(vaga => {
        for (const key in vaga) {
          if (vaga[key] !== null) {
            if (
              vaga[key]
                .toString()
                .toLowerCase()
                .indexOf(this.search.toLowerCase()) > -1
            ) {
              return true
            }
          }
        }
      })
    },
    handlerDelete(vaga) {
      window.axios
        .delete(`api/v1/vagas/${vaga.id}`)
        .then(response => {
          if (response.status === 204) {
            swal({
              title: 'Registro excluído!',
              icon: 'success'
            })

            this.vagas.splice(this.vagas.indexOf(vaga), 1)
          } else {
            swal({
              title: 'Não foi possivel remover a vaga selecionada.',
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
