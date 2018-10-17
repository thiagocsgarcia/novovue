
<template>
<div>
    <div class="col-xs-12 col-md-12 panel panel-default">
        <div class="panel-heading alert-dark">
            <h3 class="text-center">Lista de Empresas</h3>
        </div>
        <div class="panel-body">
            <div class="form-inline col-xs-10 col-md-10 col offset-1">
                <router-link :to="{name: 'criarEmpresa'}" class="btn btn-success mb-2">Nova Empresa</router-link>
                <div class="input-group col-xs-10 col-md-10 mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Pesquisar</div>
                    </div>
                    <input v-model="search" type="search" @keyup="filterData()" placeholder="Pesquisar..." class="form-control">
                </div>
            </div>
        
            <table id="tabela" class="table table-dark table-bordered table-striped" style="font-size: 10px">
                <thead>
                    <tr class="text-center">
                        <th @click="orderData('cnpj')" class="order">CNPJ</th>
                        <th @click="orderData('nome_fantasia')" class="order">Nome Fantasia</th>
                        <th @click="orderData('email')" class="order">Email</th>
                        <th @click="orderData('telefone')" class="order">Telefone</th>
                        <th @click="orderData('status')" class="order">Atualizado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>                        
                    <tr v-for="(empresa, index) in filtered" :key="index">
                        <td>{{ empresa.cnpj }}</td>
                        <td>{{ empresa.nome_fantasia }}</td>
                        <td>{{ empresa.email }}</td>
                        <td>{{ empresa.telefone }}</td>
                        <td class="text-center">
                            <span v-if="empresa.status === 0" style="color: red">
                                <ion-icon name="close" size="large"></ion-icon>
                            </span>
                            <span v-else style="color: green">
                                <ion-icon name="checkmark" size="large"></ion-icon>
                            </span>
                        </td>
                        <td class="text-center">
                            <router-link :to="{name: 'editarEmpresa', params: {id: empresa.id}}" class="btn btn-sm btn-outline-warning">Editar</router-link>
                            <span>&nbsp; | &nbsp;</span>
                            <a href="#" v-on:click="deleteData(empresa.id, index)" class="btn btn-sm btn-outline-danger">Deletar</a>
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
    computed: {
        filtered() {
            if (this.search !== '') {
                return this.filterData()
            } else {
                return this.empresas
            }
        }
    },
    mounted() {
        this.column = window.localStorage.getItem("column")
        this.order = window.localStorage.getItem("order")
        this.search = window.localStorage.getItem("search")
        this.loadData()
    },
    data: function () {
        return {
            column:  'cnpj',
            empresas: [],
            order:  'asc',
            search: ''
        }
    },
    methods: {
        deleteData(id, item) {
            swal({
                title: "Atenção",
                text: "Após excluído as informações não poderão ser recuperadas. Deseja realmente excluir?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then(del => {
                if (del) {
                    axios.delete('/api/v1/empresas/' + id)
                    .then(resp => {
                        swal({
                            text: "Exclusão realizada com sucesso!",
                            icon: "success",
                        })
                        this.empresas.splice(item, 1)
                        this.$router.go(this.$router.currentRoute)
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
        },
        filterData() {
            window.localStorage.setItem("search", this.search)

            return this.empresas.filter(empresa => {
                for (const key in empresa) {
                    if (empresa[key] !== null) {
                        if (empresa[key].toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) {
                            return true
                        }
                    }
                }
                return false
            })
        },
        loadData() {
            axios.get('/api/v1/empresas').then(response => {
                this.empresas = response.data
            }).catch(error => {
                swal({
                    title: "Não foi possivel carregar os dados",
                    text: error,
                    icon: "error",
                })
            })
        },
        orderData(column) {
            if (this.column === column) {
                this.order = this.order === 'asc' ? 'desc' : 'asc' 
                window.localStorage.setItem("order", this.order)
            } else {
                this.column = column
                this.order = 'asc'
                window.localStorage.setItem("column", this.column)
            }

            this.empresas.sort((a, b) => {
                if (this.order === 'asc') {
                    if (a[this.column] > b[this.column]) {
                        return 1
                    } else {
                        return -1
                    }
                    return 0
                } 
                if (this.order === 'desc') {
                    if (a[this.column] < b[this.column]) {
                        return 1
                    } else {
                        return -1
                    }
                    return 0
                }
            })
        }
    }
}
</script>

<style>
.order {
    cursor: pointer;
}
</style>

