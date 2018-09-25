
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'criarEmpresa'}" class="btn btn-success"><ion-icon name="add-circle"></ion-icon> Nova Empresa</router-link>
        </div>

        <div class="col-md-12 panel panel-default">
            <div class="panel-heading alert-dark"> <h4><ion-icon name="list-box"></ion-icon> Lista de empresas</h4></div>
            <div class="panel-body">
                <table class="table table-dark table-bordered table-striped" style='font-size:10px;'>
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th width="100">Ações </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="empresa, index in empresas">
                        <td>{{ empresa.nome_fantasia }}</td>
                        <td>{{ empresa.endereco }}</td>
                        <td>{{ empresa.email }}</td>
                        <td>{{ empresa.telefone }}</td>
                        <td>
                            <router-link :to="{name: 'editarEmpresa', params: {id: empresa.id}}" class="btn btn-outline-warning">
                                Edit
                            </router-link> 
                        </td>
                        <td>
                            <a href="#"
                               class="btn btn-outline-danger"
                               v-on:click="deleteEntry(empresa.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                empresas: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/empresas')
                .then(function (resp) {
                    app.empresas = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/companies/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>
