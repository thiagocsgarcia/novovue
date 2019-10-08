<template>
  <div class="py-5 px-3" style="background-color:#FFFFFF">
    <h3 class="text-center">FICHA DE CADASTRO</h3>
    <h4 class="text-center">Pré-matricula</h4>

    <form action="#" method="post">
      <h5 class="pt-5">DADOS PESSOAIS</h5>

      <div class="form-group col-md-12">
        <label for="nome">Nome completo</label>
        <input
          readonly
          type="text"
          name="nome"
          id="nome"
          class="form-control"
          v-model="inscricao.nome"
        />
      </div>

      <div class="d-flex justify-content-between">
        <div class="form-group col-md-4">
          <label for="sexo">Sexo</label>
          <select readonly name="sexo" id="sexo" class="form-control" v-model="inscricao.sexo">
            <option value></option>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="estado_civil">Estado Civil</label>
          <select
            readonly
            name="estado_civil"
            id="estado_civil"
            class="form-control"
            v-model="inscricao.estado_civil"
          >
            <option value></option>
            <option value="Solteiro (a)">Solteiro (a)</option>
            <option value="Casado (a)">Casado (a)</option>
            <option value="Separado (a)">Separado (a)</option>
            <option value="Divorciado (a)">Divorciado (a)</option>
            <option value="Viúvo (a)">Viúvo (a)</option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="dt_nascimento">Data de Nascimento</label>
          <the-mask
            readonly
            id="dt_nascimento"
            :mask="['##/##/####']"
            :masked="true"
            name="dt_nascimento"
            v-model="inscricao.dt_nascimento"
            class="form-control"
            placeholder="31/02/2222"
          ></the-mask>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <div class="form-group col-md-6">
          <label for="escolaridade">Escolaridade</label>
          <input
            readonly
            type="text"
            name="escolaridade"
            id="escolaridade"
            class="form-control"
            v-model="inscricao.escolaridade"
          />
        </div>

        <div class="form-group col-md-6">
          <label for="estrangeiro">Estrangeiro (a)</label>
          <select
            readonly
            name="estrangeiro"
            id="estrangeiro"
            class="form-control"
            v-model="inscricao.estrangeiro"
          >
            <option value="Não">Não</option>
            <option value="Sim">Sim</option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <div class="form-group col-md-6">
          <label for="mae">Nome da Mãe</label>
          <input
            readonly
            type="text"
            name="mae"
            id="mae"
            class="form-control"
            v-model="inscricao.mae"
          />
        </div>

        <div class="form-group col-md-6">
          <label for="pai">Nome do Pai</label>
          <input
            readonly
            type="text"
            name="pai"
            id="pai"
            class="form-control"
            v-model="inscricao.pai"
          />
        </div>
      </div>

      <div class="form-group col-md-12">
        <label for="deficiencia">Possui Deficiência?</label>
        <input
          readonly
          type="text"
          name="deficiencia"
          id="deficiencia"
          class="form-control"
          v-model="inscricao.deficiencia"
        />
      </div>

      <h5 class="pt-5">CONTATOS</h5>

      <div class="form-group col-md-12">
        <label for="endereco">Endereço</label>
        <textarea
          readonly
          type="text"
          name="endereco"
          id="endereco"
          class="form-control"
          v-model="inscricao.endereco"
        ></textarea>
      </div>

      <div class="d-flex justify-content-between">
        <div class="form-group col-md-4">
          <label for="email">E-mail</label>
          <input
            readonly
            type="text"
            name="email"
            id="email"
            class="form-control"
            v-model="inscricao.email"
          />
        </div>

        <div class="form-group col-md-4">
          <label for="celular">Celular</label>
          <input
            readonly
            type="text"
            name="celular"
            id="celular"
            class="form-control"
            v-model="inscricao.celular"
          />
        </div>

        <div class="form-group col-md-4">
          <label for="telefone">Telefone</label>
          <input
            readonly
            type="text"
            name="telefone"
            id="telefone"
            class="form-control"
            v-model="inscricao.telefone"
          />
        </div>
      </div>

      <h5 class="pt-5">DOCUMENTOS</h5>

      <div class="d-flex justify-content-between">
        <div class="form-group col-md-6">
          <label for="cpf">CPF</label>
          <the-mask
            readonly
            id="cpf"
            :mask="['###.###.###-##']"
            :masked="true"
            v-model="inscricao.cpf"
            class="form-control"
            placeholder="123.456.789-01"
          ></the-mask>
        </div>

        <div class="form-group col-md-6">
          <label for="rg">RG</label>
          <input readonly type="text" name="rg" id="rg" class="form-control" v-model="inscricao.rg" />
        </div>
      </div>

      <h5 class="pt-5">CURSO</h5>

      <div class="form-group col-md-12">
        <label for="curso_interesse">Curso de Interesse</label>
        <input
          readonly
          type="text"
          name="curso_interesse"
          id="curso_interesse"
          class="form-control"
          v-model="inscricao.curso_interesse"
        />
      </div>
    </form>

    <div class="pt-5 d-none d-print-block">
      <div class="d-flex justify-content-end">
        <div class="form-group col-md-6 pt-5">
          <input
            readonly
            type="text"
            placeholder="Assinatura"
            class="form-control form-control-lg text-center"
          />
        </div>
      </div>
    </div>

    <div class="pt-5 d-print-none">
      <div class="d-flex justify-content-around">
        <router-link
          :to="{ name: 'inscricoes.editar', params: { id: inscricao.id } }"
          class="btn btn-lg btn-warning"
        >Editar</router-link>
        <a href="#" class="btn btn-lg btn-success" @click.prevent="imprimir">Imprimir</a>
      </div>
    </div>
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
    imprimir() {
      window.print()
    }
  }
}
</script>
