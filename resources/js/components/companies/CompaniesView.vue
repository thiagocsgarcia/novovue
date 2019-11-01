<template>
  <div class="card">
    <div class="card-header">
      <h2 class="text-center">Dados da Empresa</h2>
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>CNPJ</strong>
          {{ empresa.cnpj }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Inscrição Estadual</strong>
          {{ empresa.ie }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Inscrição Municipal</strong>
          {{ empresa.im }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Razão Social</strong>
          {{ empresa.razao_social }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Nome Fantasia</strong>
          {{ empresa.nome_fantasia }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Porte</strong>
          {{ empresa.porte }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Ramo de Atividade</strong>
          {{ empresa.ramo_atividade }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Contato</strong>
          {{ empresa.contato }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Telefone(s)</strong>
          {{ empresa.telefone }} {{ empresa.telefone2 }} {{ empresa.celular }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Endereço</strong>
          {{ empresa.endereco }} {{ empresa.bairro }} {{ empresa.cidade }} {{ empresa.cep }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <strong>Observações</strong>
          {{ empresa.observacao }}
        </li>
      </ul>
    </div>
    <div class="card-footer">
      <h5>Atualizações:</h5>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr class="text-center">
            <th>Data/Horário</th>
            <th>Usuário</th>
            <th>Ação</th>
            <th>De</th>
            <th>Para</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="audit in audits" :key="audit.id" class="text-center">
            <td>{{moment(audit.created_at).format('DD/MM/YYYY - H:M:ss')}}h</td>
            <td>
              {{audit.name}}
              <br />
              {{ audit.email }}
            </td>
            <td>{{ eventos(audit.event) }}</td>
            <td>{{ audit.old_values }}</td>
            <td>{{ audit.new_values }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Moment from 'moment'

export default {
  created() {
    let id = this.$route.params.id
    window.axios
      .get(`api/v1/empresas/${id}`)
      .then(response => {
        if (response.status === 200) {
          this.empresa = response.data.empresa
          this.audits = response.data.audits
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
      empresa: {},
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
