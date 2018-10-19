<template>
<div>
    <div class="col-xs-12 col-md-12 panel panel-default">
        <div class="panel-heading alert-dark">
            <h3 class="text-center">A {{ empresa.nome_fantasia }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group">
                    <router-link :to="{name: 'listaEmpresas'}" class="btn btn-lg btn-warning">Editar</router-link>
                    <router-link :to="{name: 'listaEmpresas'}" class="btn btn-lg btn-primary">Vagas</router-link>
                    <router-link :to="{name: 'listaEmpresas'}" class="btn btn-lg btn-default">Fechar</router-link>
                </div>
            </div>
        </div> 
    </div>
</div>
    
</template>

<script>
export default {
    mounted() {
        let id = this.$route.params.id
        console.log(id)
        this.loadData(id)
    },
    data: function () {
        return {
            empresa: {}
        }
    },
    methods: {
        loadData(id) {
            axios.get('/api/v1/empresas/' + id)
            .then(response => {
                this.empresa = response.data
            })
            .catch(error => {
                swal({
                    title: "Não foi possivel encontrar empresa selecionada.",
                    text: error,
                    icon: "error",
                })
            })
        },
    }
}
</script>

