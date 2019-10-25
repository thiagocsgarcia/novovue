/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import Vue from 'vue'
import router from './router'
import VueTheMask from 'vue-the-mask'

Vue.use(VueTheMask)

new Vue({ router }).$mount('#app')
