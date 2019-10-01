<template>
  <div>
    <h1>Lista de Interesses para Cursos</h1>
  </div>
</template>

<script>
export default {
  data () {
    return {
      cursos: [],
      inscritos: [],
    }
  },
  mounted () {
    window.axios.get('/api/v1/cursos')
    .then(response => {
      //
    }).catch(error => {
      //
    })
  }
}
</script>
