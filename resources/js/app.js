/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueTheMask from 'vue-the-mask'

import CompaniesCreate from './components/companies/CompaniesCreate'
import CompaniesEdit from './components/companies/CompaniesEdit'
import CompaniesIndex from './components/companies/CompaniesIndex'
import CompaniesView from './components/companies/CompaniesView'

import InscricoesCadastro from './components/inscricoes/Cadastro'
import InscricoesEditar from './components/inscricoes/Editar'
import InscricoesFicha from './components/inscricoes/Ficha'
import InscricoesLista from './components/inscricoes/Lista'

Vue.use(VueRouter)
Vue.use(VueTheMask)

const routes = [
  {
    path: '/',
    redirect: { name: 'listaEmpresas' }
  },
  {
    path: '/admin/empresas',
    component: CompaniesIndex,
    name: 'listaEmpresas'
  },
  {
    path: '/admin/empresas/:id',
    component: CompaniesView,
    name: 'detalheEmpresa'
  },
  {
    path: '/admin/empresas/cadastro',
    component: CompaniesCreate,
    name: 'criarEmpresa'
  },
  {
    path: '/admin/empresas/:id/editar/',
    component: CompaniesEdit,
    name: 'editarEmpresa'
  },
  {
    path: '/admin/inscricoes-cursos',
    component: InscricoesLista,
    name: 'inscricoes.index'
  },
  {
    path: '/admin/inscricoes-cursos/cadastro',
    component: InscricoesCadastro,
    name: 'inscricoes.cadastro'
  },
  {
    path: '/admin/inscricoes-cursos/:id',
    component: InscricoesFicha,
    name: 'inscricoes.ficha'
  },
  {
    path: '/admin/inscricoes-cursos/:id/editar',
    component: InscricoesEditar,
    name: 'inscricoes.editar'
  }
]

const router = new VueRouter({ routes })

new Vue({ router }).$mount('#app')
