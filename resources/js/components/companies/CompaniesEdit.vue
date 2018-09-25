
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="col-md-12 panel panel-default">
            <div class="panel-heading">Create new empresa</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Nome</label>
                            <input type="text" v-model="empresa.nome_fantasia" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company Endereco</label>
                            <input type="text" v-model="empresa.endereco" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company Email</label>
                            <input type="text" v-model="empresa.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company Telefone</label>
                            <input type="text" v-model="empresa.telefone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
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
