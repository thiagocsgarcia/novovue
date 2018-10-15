
<template>
    <div>
        <div class="col-xs-12 col-md-12 form-group">
            <router-link :to="{name: 'criarEmpresa'}" class="btn btn-success">Nova Empresa</router-link>
        </div>

        <div class="col-xs-12 col-md-12 panel panel-default">
            <div class="panel-heading alert-dark">
                <h4>Lista de Empresas</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-md-10 col offset-md-1">
                        <input v-model="search" type="search" placeholder="Pesquisar..." class="form-control">
                    </div>
                </div>
                <table id="tabela" class="table table-dark table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>CNPJ</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>                        
                    <tr v-for="(empresa, index) in filtered" :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>{{ empresa.cnpj }}</td>
                        <td>{{ empresa.nome_fantasia }}</td>
                        <td>{{ empresa.email }}</td>
                        <td>{{ empresa.telefone }}</td>
                        <td class="text-center">
                            <router-link :to="{name: 'editarEmpresa', params: {id: empresa.id}}" class="btn btn-sm btn-outline-warning">Editar</router-link> 
                            <a href="#" v-on:click="remove(empresa.id)" class="btn btn-sm btn-outline-danger">Deletar</a>
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
            column: 1,
            empresas: [],
            order: 'asc',
            search: '',
        }
    },
    mounted() {
        this.fetchData()
    },
    computed: {
        filtered() {
            return this.empresas.filter(e => {
                localStorage.setItem("search", this.search)

                return e.cnpj.match(this.search) || 
                       e.telefone.match(this.search) || 
                       e.nome_fantasia.toLowerCase().match(this.search.toLowerCase()) || 
                       e.email.toLowerCase().match(this.search.toLowerCase())
            })
        },
        ordered() {
            localStorage.setItem("column", this.column)
            localStorage.setItem("order", this.order)
        }
    },
    methods: {
        fetchData() {
            axios.get('/api/v1/empresas')
            .then(resp => {
                this.column = localStorage.getItem("column")
                this.empresas = resp.data
                this.order = localStorage.getItem("order")
                this.search = localStorage.getItem("search")
            })
            .catch(resp => { 
                swal({
                    title: "Não foi possivel carregar as empresas",
                    text: resp,
                    icon: "error",
                })
            })
        },
        remove(id) {
            swal({
                title: "Atenção",
                text: "Após excluído as informações não poderão ser recuperadas. Deseja realmente excluir?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(remove => {
                if (remove) {
                    axios.delete('/api/v1/empresas/' + id)
                    .then(resp => {
                        swal({
                            text: "Exclusão realizada com sucesso!",
                            icon: "success",
                        })
                    })
                    .catch(resp => {
                        swal({
                            title: "Falha na exclusão",
                            text: resp,
                            icon: "error",
                        })
                    })
                }
            })
            .catch(remove => {
                swal({
                    title: "Falha na exclusão",
                    text: remove,
                    icon: "error",
                })
            })
        }
    }
}
</script>
