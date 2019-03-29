/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueTheMask from 'vue-the-mask'

import IndexEmpresa from './components/companies/CompaniesIndex'
import CriarEmpresa from './components/companies/CompaniesCreate'
import DetalheEmpresa from './components/companies/CompaniesView'
import EditarEmpresa from './components/companies/CompaniesEdit'

Vue.use(VueRouter)
Vue.use(VueTheMask)

const routes = [
  {
    path: '/',
    redirect: { name: 'listaEmpresas' }
  },
  {
    path: '/admin/empresas',
    component: IndexEmpresa,
    name: 'listaEmpresas'
  },
  {
    path: '/admin/empresa/:id',
    component: DetalheEmpresa,
    name: 'detalheEmpresa'
  },
  {
    path: '/admin/empresa/cadastro',
    component: CriarEmpresa,
    name: 'criarEmpresa'
  },
  {
    path: '/admin/empresa/:id/editar/',
    component: EditarEmpresa,
    name: 'editarEmpresa'
  }
]

const router = new VueRouter({ routes })

new Vue({ router }).$mount('#app')
