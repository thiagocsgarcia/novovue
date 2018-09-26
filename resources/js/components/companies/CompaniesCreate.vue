
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="col-md-12 panel panel-default">
            <div class="panel-heading">Cadastrar nova Empresa</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 form-group">
                            <label class="control-label">Nome Fantasia</label>
                            <input type="text" v-model="empresa.nome_fantasia" class="form-control" size='200'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Endereço</label>
                            <input type="text" v-model="empresa.endereco" class="form-control" style="width:100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="text" v-model="empresa.email" class="form-control" style="width:100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Telefone</label>
                            <input type="text" v-model="empresa.telefone" class="form-control" style="width:100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Salvar</button>
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
                    nome_fantasia: '',
                    endereco: '',
                    email: '',
                    telefone: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var novaEmpresa = app.empresa;
                axios.post('/api/v1/empresas', novaEmpresa)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>
