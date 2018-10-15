
<template>
<div>
    <div class="form-group">
        <router-link :to="{name: 'listaEmpresas'}" class="btn btn-lg btn-default">Voltar</router-link>
    </div>

    <div class="col-xs-12 col-md-12 panel panel-default">
        <div class="panel-heading alert-dark">
            <h4>Cadastrar Nova Empresa</h4>
        </div>
        <div class="panel-body">
            <br>
            <form v-on:submit="saveForm()">
                <div class="row">
                    <div class="col-xs-12 col-md-4 form-group">
                        <label class="control-label">CNPJ</label>
                        <input type="text" v-model="empresa.cnpj" class="form-control">
                    </div>
                    <div class="col-xs-12 col-md-4 form-group">
                        <label class="control-label">Inscrição Estadual</label>
                        <input type="text" v-model="empresa.ie" class="form-control">
                    </div>
                    <div class="col-xs-12 col-md-4 form-group">
                        <label class="control-label">Inscrição Municipal</label>
                        <input type="text" v-model="empresa.im" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 form-group">
                        <label class="control-label">Razão Social</label>
                        <input type="text" v-model="empresa.razao_social" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 form-group">
                        <label class="control-label">Nome Fantasia</label>
                        <input type="text" v-model="empresa.nome_fantasia" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 form-group">
                        <label class="control-label">Contato</label>
                        <input type="text" v-model="empresa.contato" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 form-group">
                        <label class="control-label">Porte</label>
                        <input type="text" v-model="empresa.porte" class="form-control">
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <label class="control-label">Ramo de Atividade</label>
                        <input type="text" v-model="empresa.ramo_atividade" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 form-group">
                        <label class="control-label">E-mail</label>
                        <input type="text" v-model="empresa.email" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 form-group">
                        <label class="control-label">Endereço</label>
                        <input type="text" v-model="empresa.endereco" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4 form-group">
                        <label class="control-label">Bairro</label>
                        <input type="text" v-model="empresa.bairro" class="form-control">
                    </div>
                    <div class="col-xs-12 col-md-4 form-group">
                        <label class="control-label">Cidade</label>
                        <input type="text" v-model="empresa.cidade" class="form-control">
                    </div>
                    <div class="col-xs-12 col-md-4 form-group">
                        <label class="control-label">CEP</label>
                        <input type="text" v-model="empresa.cep" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 form-group">
                        <label class="control-label">Telefone</label>
                        <input type="text" v-model="empresa.telefone" class="form-control">
                    </div>
                    <div class="col-xs-12 col-md-6 form-group">
                        <label class="control-label">Celular</label>
                        <input type="text" v-model="empresa.celular" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 form-group">
                        <button class="btn btn-lg btn-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data: function () {
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
            }
        }
    },
    methods: {
        saveForm() {
            event.preventDefault()
            let app = this
            axios.post('/api/v1/empresas', this.empresa)
            .then(function (resp) {
                app.$router.push({path: '/'});
            })
            .catch(function (resp) {
                swal({
                    title: "Não foi possivel realizar o cadastro.",
                    text: resp,
                    icon: "error",
                })
            });
        }
    }
}
</script>
