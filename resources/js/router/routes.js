import CompaniesCreate from '../components/companies/CompaniesCreate'
import CompaniesEdit from '../components/companies/CompaniesEdit'
import CompaniesIndex from '../components/companies/CompaniesIndex'
import CompaniesView from '../components/companies/CompaniesView'

import InscricoesCadastro from '../components/inscricoes/Cadastro'
import InscricoesEditar from '../components/inscricoes/Editar'
import InscricoesFicha from '../components/inscricoes/Ficha'
import InscricoesLista from '../components/inscricoes/Lista'

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

export default routes
