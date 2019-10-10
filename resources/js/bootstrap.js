window.Popper = require('popper.js').default
window.swal = require('sweetalert')

try {
  window.$ = window.jQuery = require('jquery')
  require('bootstrap')
} catch (e) {
  console.error(e)
}

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// URL de Desenvolvimento e Testes
window.axios.defaults.baseURL = 'http://localhost/empresas/api/v1'

// URL de Produção
// window.axios.defaults.baseURL = 'http://www.desenvolve.saovicente.sp.gov.br/empresas/api/v1'

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js')

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// })
