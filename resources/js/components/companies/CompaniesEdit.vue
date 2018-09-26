
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="col-md-12 panel panel-default">
            <div class="panel-heading"><h4 class="alert-dark"> <ion-icon name="list-box"></ion-icon> Editar Empresa</h4></div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">CNPJ</label>
                            <input type="text" v-model="empresa.cnpj" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Nome</label>
                            <input type="text" v-model="empresa.nome_fantasia" class="form-control" size='120'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Endereco</label>
                            <input type="text" v-model="empresa.endereco" class="form-control" size='120'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="text" v-model="empresa.email" class="form-control" size='100'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Telefone</label>
                            <input type="text" v-model="empresa.telefone" class="form-control">
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
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.EmpresaId = id;
            axios.get('/api/v1/empresas/' + id)
                .then(function (resp) {
                    app.empresa = resp.data;
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                EmpresaId: null,
                empresa: {
                    cnpj: '',
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
                axios.patch('/api/v1/empresas/' + app.EmpresaId, novaEmpresa)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>
