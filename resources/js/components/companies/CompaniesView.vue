<template>
  <div>
    <div class="col-xs-12 col-md-12 panel panel-default">
      <div class="panel-heading alert-dark">
        <h3 class="text-center">Nome Fantasia {{ empresa.nome_fantasia }}</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="form-group">
            <router-link :to="{ name: 'empresas.index' }" class="btn btn-lg btn-warning">Editar</router-link>
            <router-link :to="{ name: 'empresas.index' }" class="btn btn-lg btn-primary">Vagas</router-link>
            <router-link :to="{ name: 'empresas.index' }" class="btn btn-lg btn-default">Fechar</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    let id = this.$route.params.id
    window.axios
      .get(`api/v1/empresas/${id}`)
      .then(response => {
        if (response.status === 200) {
          this.empresa = response.data.empresa
        } else {
          swal({
            title: 'Não foi possivel encontrar empresa selecionada.',
            icon: 'error'
          })
        }
      })
      .catch(error => {
        console.log(error.response)
      })
  },
  data() {
    return {
      empresa: {}
    }
  }
}
</script>
