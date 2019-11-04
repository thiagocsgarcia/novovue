<template>
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="thead-dark">
            <tr class="text-center">
              <th style="max-width: 4em">Data/Hora</th>
              <th style="max-width: 3em">Ação</th>
              <th style="max-width: 7em">Usuário</th>
              <th>Empresa</th>
              <th style="max-width: 9em">De</th>
              <th style="max-width: 9em">Para</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="audit in audits" :key="audit.id">
              <td class="text-center align-middle" style="max-width: 4em">
                {{ moment(audit.created_at).format('DD/MM/YYYY') }}
                <br />
                {{ moment(audit.created_at).format('H:M') }}h
              </td>
              <td class="text-center align-middle" style="max-width: 3em">{{ eventos(audit.event) }}</td>
              <td class="text-center align-middle" style="max-width: 7em">
                {{ audit.name }}
                <br />
                {{ audit.email }}
              </td>
              <td class="text-center align-middle">
                {{ audit.cnpj}}
                <br />
                {{ audit.razao_social }}
                <br />
                {{ audit.nome_fantasia }}
              </td>
              <td class="text-justify" style="max-width: 9em">{{ audit.old_values }}</td>
              <td class="text-justify" style="max-width: 9em">{{ audit.new_values }}</td>
            </tr>
          </tbody>
        </table>
      </div>
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
      if (event.toString() === 'created') return 'Cadastro'
      if (event.toString() === 'deleted') return 'Exclusão'
      if (event.toString() === 'updated') return 'Alteração'
    }
  }
}
</script>
