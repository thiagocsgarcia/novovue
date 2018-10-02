
<template>
    <div>
        <div class="col-xs-12 col-md-12 form-group">
            <router-link :to="{name: 'criarEmpresa'}" class="btn btn-success"><add-circle /> Nova Empresa</router-link>
        </div>

        <div class="col-xs-12 col-md-12 panel panel-default">
            <div class="panel-heading alert-dark">
                <h4><list-box w="25" h="25"/> Lista de Empresas</h4>
            </div>
            <div class="panel-body">
                <br>
                <table class="table table-dark table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>CNPJ</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>                        
                    <tr v-for="(empresa, index) in empresas" :key="index">
                        <td>{{ empresa.cnpj }}</td>
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
        let app = this;
        axios.get('/api/v1/empresas')
        .then(function (resp) {
            app.empresas = resp.data
        })
        .catch(function (resp) {
            console.log(resp)
            alert("Não foi possivel carregar as empresas.")
        })
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm("Deseja realmente excluir?")) {
                let app = this;
                axios.delete('/api/v1/empresas/' + id)
                .then(function (resp) {
                    app.empresas.splice(index, 1);
                })
                .catch(function (resp) {
                    console.log(resp)
                    alert("Não foi possivel excluir a empresa selecionada.");
                });
            }
        }
    }
}
</script>
