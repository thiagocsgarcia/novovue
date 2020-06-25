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
              {{ vaga.empresa_cnpj }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Nome da Empresa</strong>
              {{ vaga.empresa_nome }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Responsável</strong>
              {{ vaga.empresa_responsavel }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>E-mail</strong>
              {{ vaga.empresa_email }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Telefone</strong>
              {{ vaga.empresa_telefone }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Endereço</strong>
              {{ vaga.empresa_endereco }}
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
              {{ vaga.vaga_titulo }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade</strong>
              {{ vaga.vaga_quantidade }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Descrição</strong>
              {{ vaga.vaga_descricao }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Salário</strong>
              {{ vaga.vaga_salario }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Benefícios</strong>
              {{ vaga.vaga_beneficios }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Jornada de trabalho</strong>
              {{ vaga.vaga_jornada }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Endereço do trabalho</strong>
              {{ vaga.vaga_endereco_trabalho }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Responsável</strong>
              {{ vaga.vaga_responsavel }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Contato</strong>
              {{ vaga.vaga_contato_responsavel }}
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
              <strong>Experiência</strong>
              {{ vaga.candidato_experiencia }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Tempo de experiência</strong>
              {{ vaga.candidato_qtd_experiencia }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Escolaridade</strong>
              {{ vaga.candidato_escolaridade }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>PCD (Pessoa com Deficiência)</strong>
              {{ vaga.candidato_pcd }} {{ vaga.candidato_deficiencia }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>CNH (Carteira Nacional de Habilitação)</strong>
              {{ vaga.candidato_cnh }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Cidades</strong>
              {{ vaga.candidato_cidades }}
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
              {{ vaga.entrevista_endereco }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Datas</strong>
              {{ vaga.entrevista_datas }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Horários</strong>
              {{ vaga.entrevista_horarios }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade Candidatos</strong>
              {{ vaga.entrevista_qtd_candidatos }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade Candidatos por Dia</strong>
              {{ vaga.entrevista_qtd_dia }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Quantidade Candidatos por Períodos</strong>
              {{ vaga.entrevista_qtd_periodos }}
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <strong>Nome do Selecionador</strong>
              {{ vaga.entrevista_selecionador }}
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
      vaga: {}
    }
  }
}
</script>
