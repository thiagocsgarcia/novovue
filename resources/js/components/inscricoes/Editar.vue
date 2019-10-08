<template>
  <div class="p-5" style="background-color:#FFFFFF">
    <h3 class="text-center">FICHA DE CADASTRO</h3>
    <h4 class="text-center">Pré-matricula</h4>

    <form action="#" method="post">
      <h4 class="pt-4">DADOS PESSOAIS</h4>
      <div class="form-group">
        <label for="nome">Nome completo</label>
        <input type="text" name="nome" id="nome" class="form-control" v-model="inscricao.nome" />
      </div>

      <div class="form-group">
        <label for="sexo">Sexo</label>
        <select name="sexo" id="sexo" class="form-control" v-model="inscricao.sexo">
          <option value></option>
          <option value="Feminino">Feminino</option>
          <option value="Masculino">Masculino</option>
        </select>
      </div>

      <div class="form-group">
        <label for="estado_civil">Estado Civil</label>
        <input
          type="text"
          name="estado_civil"
          id="estado_civil"
          class="form-control"
          v-model="inscricao.estado_civil"
        />
      </div>

      <div class="form-group">
        <label for="dt_nascimento">Data de Nascimento</label>
        <the-mask
          id="dt_nascimento"
          :mask="['##/##/####']"
          :masked="true"
          name="dt_nascimento"
          v-model="inscricao.dt_nascimento"
          class="form-control"
          placeholder="31/02/2222"
        ></the-mask>
      </div>

      <div class="form-group">
        <label for="escolaridade">Escolaridade</label>
        <input
          type="text"
          name="escolaridade"
          id="escolaridade"
          class="form-control"
          v-model="inscricao.escolaridade"
        />
      </div>

      <div class="form-group">
        <label for="estrangeiro">Estrangeiro (a)</label>
        <select
          name="estrangeiro"
          id="estrangeiro"
          class="form-control"
          v-model="inscricao.estrangeiro"
        >
          <option value="Não">Não</option>
          <option value="Sim">Sim</option>
        </select>
      </div>

      <div class="form-group">
        <label for="deficiencia">Possui Deficiência?</label>
        <input
          type="text"
          name="deficiencia"
          id="deficiencia"
          class="form-control"
          v-model="inscricao.deficiencia"
        />
      </div>

      <h4 class="pt-4">ENDEREÇO</h4>

      <div class="form-group">
        <textarea
          type="text"
          name="endereco"
          id="endereco"
          class="form-control"
          v-model="inscricao.endereco"
        ></textarea>
      </div>

      <h4 class="pt-4">DOCUMENTOS</h4>

      <div class="form-group">
        <label for="cpf">CPF</label>
        <the-mask
          id="cpf"
          :mask="['###.###.###-##']"
          :masked="true"
          v-model="inscricao.cpf"
          class="form-control"
          placeholder="123.456.789-01"
        ></the-mask>
      </div>

      <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" class="form-control" v-model="inscricao.rg" />
      </div>

      <h4 class="pt-4">CURSO DE INTERESSE</h4>
      <div class="form-group">
        <input
          type="text"
          name="curso_interesse"
          id="curso_interesse"
          class="form-control"
          v-model="inscricao.curso_interesse"
        />
      </div>

      <div class="form-group pt-4">
        <button type="submit" class="btn btn-lg btn-primary">Salvar Alterações</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  created() {
    let id = this.$route.params.id

    window.axios
      .get(`/inscricoes-cursos/${id}`)
      .then(response => {
        this.inscricao = response.data
      })
      .catch(error => {
        //
      })
  },
  data() {
    return {
      inscricao: {}
    }
  },
  methods: {
    update() {
      window.axios
        .patch(`/inscricoes-cursos/${this.inscricao.id}`, this.inscricao)
        .then(response => {
          this.$router.replace(`/inscricoes-cursos/${this.inscricao.id}`)
        })
        .catch(error => {
          //
        })
    }
  }
}
</script>
