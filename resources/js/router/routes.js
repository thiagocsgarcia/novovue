import AuditsList from '../components/audits/List'

import CompaniesCreate from '../components/companies/CompaniesCreate'
import CompaniesEdit from '../components/companies/CompaniesEdit'
import CompaniesIndex from '../components/companies/CompaniesIndex'
import CompaniesShow from '../components/companies/CompaniesView'

import InscricoesCadastro from '../components/inscricoes/Cadastro'
import InscricoesEditar from '../components/inscricoes/Editar'
import InscricoesFicha from '../components/inscricoes/Ficha'
import InscricoesLista from '../components/inscricoes/Lista'

import VagasCreate from '../components/vagas/Create'
import VagasEdit from '../components/vagas/Edit'
import VagasIndex from '../components/vagas/List'
import VagasShow from '../components/vagas/View'

const routes = [
  {
    path: '/',
    component: CompaniesIndex,
    name: 'home'
  },
  {
    path: '/admin/empresas',
    component: CompaniesIndex,
    name: 'empresas.index'
  },
  {
    path: '/admin/empresas/cadastro',
    component: CompaniesCreate,
    name: 'empresas.create'
  },
  {
    path: '/admin/empresas/:id/editar/',
    component: CompaniesEdit,
    name: 'empresas.edit'
  },
  {
    path: '/admin/empresas/:id',
    component: CompaniesShow,
    name: 'empresas.show'
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
  },
  {
    path: '/admin/auditoria',
    component: AuditsList,
    name: 'audits.list'
  },
  {
    path: '/admin/vagas',
    component: VagasIndex,
    name: 'vagas.index'
  },
  {
    path: '/admin/vagas/cadastro',
    component: VagasCreate,
    name: 'vagas.create'
  },
  {
    path: '/admin/vagas/:id/editar/',
    component: VagasEdit,
    name: 'vagas.edit'
  },
  {
    path: '/admin/vagas/:id',
    component: VagasShow,
    name: 'vagas.show'
  }
]

export default routes
