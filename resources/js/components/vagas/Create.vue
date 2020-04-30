<template>
  <div>
    <h3>Cadastro</h3>

    <form action="#" method="post" @submit.prevent="create">
      <div class="form-grooup">
        <select class="form-control" v-model="empresa_id">
          <option value=""></option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      empresa_id: ''
    }
  },
  methods: {
    create() {
      alert('Creating empresa...')
    }
  }
}
</script>
