
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
import EditarEmpresa from './components/companies/CompaniesEdit.vue';

import AddCircle from 'vue-ionicons/dist/md-add-circle'
import Business from 'vue-ionicons/dist/md-business'
import ListBox from 'vue-ionicons/dist/md-list-box'

Vue.component('add-circle', AddCircle)
Vue.component('business', Business)
Vue.component('list-box', ListBox)

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: IndexEmpresa
        }
    },
    { path: '/admin/companies/create', component: CriarEmpresa, name: 'criarEmpresa' },
    { path: '/admin/companies/edit/:id', component: EditarEmpresa, name: 'editarEmpresa' },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
