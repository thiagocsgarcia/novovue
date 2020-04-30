<template>
  <div>
    <h1>Vagas</h1>
  </div>
</template>

<script>
import VagasCreate from '../components/vagas/Create'
import VagasEdit from '../components/vagas/Edit'
import VagasList from '../components/vagas/List'
import VagasView from '../components/vagas/View'

export default {
  name: 'Vagas',
  components: {
    VagasCreate,
    VagasEdit,
    VagasList,
    VagasView
  },
  data() {
    return {
      action: ''
    }
  }
}
</script>
