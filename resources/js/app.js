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

import CursosCreate from './components/cursos/CursosCreate'
import CursosEdit from './components/cursos/CursosEdit'
import CursosIndex from './components/cursos/CursosIndex'
import CursosView from './components/cursos/CursosView'

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
    path: '/admin/cursos',
    component: CursosIndex,
    name: 'cursos.index'
  },
  {
    path: '/admin/cursos/:id',
    component: CursosView,
    name: 'cursos.view'
  },
  {
    path: '/admin/cursos/cadastro',
    component: CursosCreate,
    name: 'cursos.create'
  },
  {
    path: '/admin/cursos/:id/editar/',
    component: CursosEdit,
    name: 'cursos.edit'
  }
]

const router = new VueRouter({ routes })

new Vue({ router }).$mount('#app')
