
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import IndexEmpresa from './components/companies/CompaniesIndex.vue';
import CriarEmpresa from './components/companies/CompaniesCreate.vue';
import DetalheEmpresa from './components/companies/CompaniesView.vue';
import EditarEmpresa from './components/companies/CompaniesEdit.vue';

const routes = [
    { path: '/', redirect: {name: 'listaEmpresas'} },
    { path: '/admin/empresas', component: IndexEmpresa, name: 'listaEmpresas' },
    { path: 'admin/empresas/:id', component: DetalheEmpresa, name:'detalheEmpresa'},
    { path: '/admin/empresas/cadastro', component: CriarEmpresa, name: 'criarEmpresa' },
    { path: '/admin/empresas/:id/editar/', component: EditarEmpresa, name: 'editarEmpresa' },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
