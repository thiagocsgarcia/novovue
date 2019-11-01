
<template>
  <div class="card">
    <div class="card-body">
      <h2 class="text-center py-3">Lista de Empresas</h2>

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

        <router-link :to="{ name: 'empresas.create' }" class="btn btn-primary">
          <i class="fas fa-plus"></i> Nova Empresa
        </router-link>
      </div>

      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>CNPJ</th>
            <th>Nome Fantasia</th>
            <th>Razão Social</th>
            <th>Email</th>
            <th>Telefone</th>
            <th colspan="3">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="empresa in filtered" :key="empresa.id">
            <td>{{ empresa.cnpj }}</td>
            <td>{{ empresa.nome_fantasia }}</td>
            <td>{{ empresa.razao_social }}</td>
            <td>{{ empresa.email }}</td>
            <td>{{ empresa.telefone }}</td>
            <td class="text-center">
              <router-link
                :to="{ name: 'empresas.show', params: { id: empresa.id } }"
                class="btn btn-sm btn-success"
              >
                <i class="fas fa-eye"></i>
              </router-link>
            </td>
            <td class="text-center">
              <router-link
                :to="{ name: 'empresas.edit', params: { id: empresa.id } }"
                class="btn btn-sm btn-warning"
              >
                <i class="fas fa-pencil-alt"></i>
              </router-link>
            </td>
            <td>
              <button @click="excluir(empresa)" class="btn btn-sm btn-danger">
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
    window.axios
      .get('api/v1/empresas')
      .then(response => {
        if (response.status === 200) {
          this.empresas = response.data.empresas
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
        return this.empresas
      }
    }
  },
  data() {
    return {
      empresas: [],
      search: ''
    }
  },
  methods: {
    excluir(empresa) {
      swal({
        title: 'Atenção',
        text:
          'Após excluído as informações não poderão ser recuperadas. Deseja realmente excluir?',
        icon: 'warning',
        buttons: true,
        dangerMode: true
      }).then(result => {
        if (result) {
          this.handlerDelete(empresa)
        }
      })
    },
    filterData() {
      return this.empresas.filter(empresa => {
        for (const key in empresa) {
          if (empresa[key] !== null) {
            if (
              empresa[key]
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
    handlerDelete(empresa) {
      window.axios
        .delete(`api/v1/empresas/${empresa.id}`)
        .then(response => {
          if (response.status === 204) {
            swal({
              title: 'Registro excluído!',
              icon: 'success'
            })

            this.empresas.splice(this.empresas.indexOf(empresa), 1)
          } else {
            swal({
              title: 'Não foi possivel remover a empresa selecionada.',
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
