<template>
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-center">Informações da Vaga</h2>
        <router-link :to="{ name: 'vagas.index' }" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i>
          Voltar
        </router-link>
      </div>

      <div class="card mt-4">
        <div class="card-header">
          <h4 class="text-center">Identificação do Empregador</h4>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>CNPJ</strong>
              {{ empresa.cnpj }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Nome da Empresa</strong>
              {{ empresa.nome_fantasia }} - {{ empresa.razao_social }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Responsável</strong>
              {{ empresa.contato }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>E-mail</strong>
              {{ empresa.email }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Telefone</strong>
              {{ empresa.telefone }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Endereço</strong>
              {{ empresa.endereco }}
            </li>
          </ul>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-header">
          <h4 class="text-center">Perfil da Vaga</h4>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Vaga</strong>
              {{ vaga.vaga }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade</strong>
              {{ vaga.quantidade }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Descrição</strong>
              {{ vaga.descricao }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Salário</strong>
              {{ vaga.salario }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Benefícios</strong>
              {{ vaga.beneficios }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Jornada de trabalho</strong>
              {{ vaga.jornada }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Endereço do trabalho</strong>
              {{ vaga.endereco_trabalho }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Responsável</strong>
              {{ vaga.responsavel }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Contato</strong>
              {{ vaga.telefone }}
            </li>
          </ul>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-header">
          <h4 class="text-center">Perfil do Candidato</h4>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Cidades</strong>
              {{ vaga.cidades }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Experiência</strong>
              {{ vaga.experiencia }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Tempo de experiência</strong>
              {{ vaga.qtd_experiencia }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Escolaridade</strong>
              {{ vaga.escolaridade }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>CNH (Carteira Nacional de Habilitação)</strong>
              {{ vaga.cnh }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>PCD (Pessoa com Deficiência)</strong>
              {{ vaga.pcd }} {{ vaga.deficiencia }}
            </li>
          </ul>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-header">
          <h4 class="text-center">Entrevista</h4>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Local</strong>
              {{ vaga.endereco_entrevista }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Dias</strong>
              {{ vaga.dias_entrevista }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Horários</strong>
              {{ vaga.horarios_entrevista }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade Candidatos</strong>
              {{ vaga.qtd_candidatos }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade Candidatos por Dia</strong>
              {{ vaga.qtd_candidatos_dias }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade Candidatos por Períodos</strong>
              {{ vaga.qtd_candidatos_periodo }}
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Nome do Selecionador</strong>
              {{ vaga.selecionador }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    let id = this.$route.params.id

    axios
      .get(`api/v1/vagas/${id}`)
      .then(response => {
        if (response.status === 200) {
          this.vaga = response.data.vaga

          axios.get(`api/v1/empresas/${this.vaga.empresa_id}`).then(response => {
            this.empresa = response.data.empresa
          })
        } else {
          swal({
            title: 'Não foi possivel encontrar a vaga selecionada.',
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
      vaga: {}
    }
  }
}
</script>
