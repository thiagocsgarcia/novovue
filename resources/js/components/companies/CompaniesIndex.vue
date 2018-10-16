
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
                    <input v-model="search" @keyup="filterData" type="search" placeholder="Pesquisar..." class="form-control">
                </div>
            </div>
        
            <table id="tabela" class="table table-dark table-bordered table-striped" style="font-size: 10px">
                <thead>
                    <tr class="text-center">
                        <th @click="orderData('cnpj')" class="order">CNPJ</th>
                        <th @click="orderData('empresa')" class="order">Empresa</th>
                        <th @click="orderData('email')" class="order">Email</th>
                        <th @click="orderData('telefone')" class="order">Telefone</th>
                        <th @click="orderData('status')" class="order">Atualizado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>                        
                    <tr v-for="(empresa, index) in empresas" :key="index">
                        <td>{{ empresa.cnpj }}</td>
                        <td>{{ empresa.nome_fantasia }}</td>
                        <td>{{ empresa.email }}</td>
                        <td>{{ empresa.telefone }}</td>
                        <td class="text-center">
                            <span v-if="empresa.status === 0" style="color: red">
                                <ion-icon name="close" size="large"></ion-icon>
                            </span>
                            <span v-if="empresa.status === 1" style="color: green">
                                <ion-icon name="checkmark" size="large"></ion-icon>
                            </span>
                        </td>
                        <td class="text-center">
                            <router-link :to="{name: 'editarEmpresa', params: {id: empresa.id}}" class="btn btn-sm btn-outline-warning">Editar</router-link>
                            <span>&nbsp; | &nbsp;</span>
                            <a href="#" v-on:click="remove(empresa.id, index)" class="btn btn-sm btn-outline-danger">Deletar</a>
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
            order: 1,
            search: '',
        }
    },
    mounted() {
        this.loadData()
    },
    methods: {
        filterData() {
            if (this.search) {
                console.log(this.search)
                this.empresas = this.empresas.filter(empresa => {
                    return empresa.cnpj.match(this.search) || empresa.nome_fantasia.toLowerCase().match(this.search.toLowerCase())
                })
            } else {
                this.empresas = this.loadData()
            }
        },
        loadData() {
            axios.get('/api/v1/empresas')
            .then(resp => {
                this.empresas = resp.data
                this.search   = localStorage.getItem("search")
            })
            .catch(resp => { 
                swal({
                    title: "Não foi possivel carregar as empresas",
                    text: resp,
                    icon: "error",
                })
            })
        },
        orderData(column) {
            this.order = this.order === 1 ? 0 : 1
            this.column = column
            console.log(column, this.order)
        },
        remove(id, item) {
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
        }
    }
}
</script>

<style>
.order {
    cursor: pointer;
}
</style>

