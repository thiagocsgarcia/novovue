
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'criarEmpresa'}" class="btn btn-success"><add-circle /> Nova Empresa</router-link>
        </div>

        <div class="col-md-12 panel panel-default">
            <div class="panel-heading alert-dark"> <h4><list-box /> Lista de empresas</h4></div>
            <div class="panel-body">
                <table class="table table-dark table-bordered table-striped" style='font-size:10px;'>
                    <thead>
                    <tr>
                        <th style="margin-left: auto;margin-right: auto;">CNPJ</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>                        
                    <tr v-for="(empresa, index) in empresas" :key="index">
                        <td style="width:100%;">{{ empresa.cnpj }}</td>
                        <td>{{ empresa.nome_fantasia }}</td>
                        <td>{{ empresa.endereco }} - {{empresa.cidade}}</td>
                        <td>{{ empresa.email }}</td>
                        <td>{{ empresa.telefone }}</td>
                        <td>
                            <router-link :to="{name: 'editarEmpresa', params: {id: empresa.id}}" class="btn btn-outline-warning">
                                Editar
                            </router-link> 
                        </td>
                        <td>
                            <a href="#" class="btn btn-outline-danger" v-on:click="deleteEntry(empresa.id, index)">
                                Deletar
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
                alert("Não foi possivel carregar as empresas.");
            });
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm("Deseja realmente excluir?")) {
                var app = this;
                axios.delete('/api/v1/empresas/' + id)
                    .then(function (resp) {
                        app.companies.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Não foi possivel excluir a empresa selecionada.");
                    });
            }
        }
    }
}
</script>
