<template>
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-hover table-striped" style="font-size: 0.8em">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>Data/Hora</th>
            <th>Empresa</th>
            <th>Ação</th>
            <th>De</th>
            <th>Para</th>
            <th>Usuário</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="audit in audits" :key="audit.id">
            <td class="text-center align-middle">
              {{ moment(audit.created_at).format('DD/MM/YYYY') }}
              <br />
              {{ moment(audit.created_at).format('H:M') }}h
            </td>
            <td class="text-center align-middle">
              {{ audit.cnpj}}
              <br />
              {{ audit.razao_social }}
              <br />
              {{ audit.nome_fantasia }}
            </td>
            <td class="align-middle">{{ eventos(audit.event) }}</td>
            <td class="align-middle">{{ audit.old_values }}</td>
            <td class="align-middle">{{ audit.new_values }}</td>
            <td class="text-center align-middle">
              {{ audit.name }}
              <br />
              {{ audit.email }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Moment from 'moment'

export default {
  name: 'audits-list',
  created() {
    window.axios
      .get('api/v1/audits')
      .then(response => {
        const { status, data } = response
        if (status === 200) {
          this.audits = data.audits
        }
      })
      .catch(error => {
        console.log(error.response)
      })
  },
  data() {
    return {
      audits: [],
      moment: Moment
    }
  },
  methods: {
    eventos(event) {
      console.log(event)
      if (event.toString() === 'created') return 'Cadastro'
      if (event.toString() === 'updated') return 'Alteração'
    }
  }
}
</script>
