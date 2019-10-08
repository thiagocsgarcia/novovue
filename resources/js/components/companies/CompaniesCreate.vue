
<template>
  <div>
    <div class="form-group">
      <router-link :to="{name: 'listaEmpresas'}" class="btn btn-lg btn-default">Voltar</router-link>
    </div>

    <div class="col-xs-12 col-md-12 panel panel-default">
      <div class="panel-heading alert-dark">
        <h3 class="text-center">Cadastrar Nova Empresas</h3>
      </div>
      <div class="panel-body">
        <br />
        <form v-on:submit="saveForm()">
          <div class="row">
            <div class="col-xs-12 col-md-4 form-group">
              <label for="cnpj" class="control-label">CNPJ</label>
              <the-mask
                id="cnpj"
                :mask="['###.###.###-##', '##.###.###/####-##']"
                :masked="true"
                v-model="empresa.cnpj"
                class="form-control"
                placeholder="99.999.999/9999-99"
              ></the-mask>
            </div>
            <div class="col-xs-12 col-md-4 form-group">
              <label for="ie" class="control-label">Inscrição Estadual</label>
              <input id="ie" v-model="empresa.ie" class="form-control" />
            </div>
            <div class="col-xs-12 col-md-4 form-group">
              <label for="im" class="control-label">Inscrição Municipal</label>
              <input id="im" v-model="empresa.im" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6 form-group">
              <label for="razao_social" class="control-label">Razão Social</label>
              <input id="razao_social" v-model="empresa.razao_social" class="form-control" />
            </div>
            <div class="col-xs-12 col-md-6 form-group">
              <label for="nome_fantasia" class="control-label">Nome Fantasia</label>
              <input id="nome_fantasia" v-model="empresa.nome_fantasia" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6 form-group">
              <label for="porte" class="control-label">Porte</label>
              <input id="porte" v-model="empresa.porte" class="form-control" />
            </div>
            <div class="col-xs-12 col-md-6 form-group">
              <label for="ramo_atividade" class="control-label">Ramo de Atividade</label>
              <input id="ramo_atividade" v-model="empresa.ramo_atividade" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6 form-group">
              <label for="contato" class="control-label">Contato</label>
              <input id="contato" v-model="empresa.contato" class="form-control" />
            </div>
            <div class="col-xs-12 col-md-6 form-group">
              <label for="email" class="control-label">E-mail</label>
              <input id="email" type="email" v-model="empresa.email" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 form-group">
              <label for="endereco" class="control-label">Endereço</label>
              <input id="endereco" v-model="empresa.endereco" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-4 form-group">
              <label for="bairro" class="control-label">Bairro</label>
              <input id="bairro" v-model="empresa.bairro" class="form-control" />
            </div>
            <div class="col-xs-12 col-md-4 form-group">
              <label for class="control-label">Cidade</label>
              <input id v-model="empresa.cidade" class="form-control" />
            </div>
            <div class="col-xs-12 col-md-4 form-group">
              <label for="cep" class="control-label">CEP</label>
              <the-mask
                id="cep"
                mask="#####-###"
                :masked="true"
                v-model="empresa.cep"
                class="form-control"
                placeholder="99999-999"
              ></the-mask>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-4 form-group">
              <label for="telefone" class="control-label">Telefone</label>
              <the-mask
                id="telefone"
                :mask="['(##) ####-####', '(##) #####-####']"
                :masked="true"
                v-model="empresa.telefone"
                class="form-control"
                placeholder="(99) 9999-9999"
              ></the-mask>
            </div>
            <div class="col-xs-12 col-md-4 form-group">
              <label for="telefone2" class="control-label">Telefone 2</label>
              <the-mask
                id="telefone2"
                :mask="['(##) ####-####', '(##) #####-####']"
                :masked="true"
                v-model="empresa.telefone2"
                class="form-control"
                placeholder="(99) 9999-9999"
              ></the-mask>
            </div>
            <div class="col-xs-12 col-md-4 form-group">
              <label for="celular" class="control-label">Celular</label>
              <the-mask
                id="celular"
                :mask="['(##) ####-####', '(##) #####-####']"
                :masked="true"
                v-model="empresa.celular"
                class="form-control"
                placeholder="(99) 99999-9999"
              ></the-mask>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 form-group">
              <label for="observacoes" class="control-label">Observações</label>
              <textarea id="observacoes" v-model="empresa.observacao" class="form-control"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6 form-group text-right">
              <button class="btn btn-lg btn-success">Cadastrar Empresa</button>
            </div>
            <div class="col-xs-12 col-md-6 form-check text-left">
              <input type="checkbox" v-model="empresa.status" id="status" class="form-check-input" />
              <label class="form-check-label" for="status">Marcar como atualizado?</label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      empresa: {
        bairro: '',
        celular: '',
        cep: '',
        cidade: '',
        cnpj: '',
        contato: '',
        email: '',
        endereco: '',
        ie: '',
        im: '',
        nome_fantasia: '',
        porte: '',
        ramo_atividade: '',
        razao_social: '',
        telefone: '',
        telefone2: '',
        status: 1
      }
    }
  },
  methods: {
    saveForm() {
      event.preventDefault()
      let app = this
      axios
        .post('/empresas', this.empresa)
        .then(function(resp) {
          app.$router.push({ path: '/' })
        })
        .catch(function(resp) {
          swal({
            title: 'Não foi possivel realizar o cadastro.',
            text: resp,
            icon: 'error'
          })
        })
    }
  }
}
</script>
