<template>
  <div class="col-12 col-xs-12 col-md-12 col-xl-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="text-center">{{ inscricao.curso_interesse }}</h3>
      </div>
      <div class="panel-body">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    let id = this.$route.params.id

    window.axios.get(`/inscricoes-cursos/${id}`).then(response => {
      this.inscricao = response.data
    })
    .catch(error => {
      //
    })
  },
  data () {
    return {
      inscricao: {}
    }
  }
}
</script>
