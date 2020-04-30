import './bootstrap'
import Vue from 'vue'
import App from './App.vue'
import VueTheMask from 'vue-the-mask'
import router from './router'

Vue.use(VueTheMask)

new Vue({
  el: '#app',
  render: h => h(App),
  router
})
