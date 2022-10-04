/* jslint browser */
/* global window */

window._ = require('lodash');

window.$ = require('jquery');
require('bootstrap');

window.Vue = require('vue');
Vue.component('Shelf', require('./components/Shelf.vue').default);
window.axios = require('axios');
const app = new Vue({el: '#app'})