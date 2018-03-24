
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import swal from 'sweetalert2'
import LaravelValidator from 'vue-laravel-validator';
import SweetModal from 'sweet-modal-vue/src/plugin.js';
import { store } from './store/store.js';
import Vuelidate from 'vuelidate';
import axios from 'axios';

axios.defaults.baseUrl = "http://127.0.0.1:8000";
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
require('./bootstrap');

window.swal = swal
window.Vue = require('vue');
Vue.prototype.$http = axios;
Vue.use(LaravelValidator);
Vue.use(SweetModal);
Vue.use(Vuelidate);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('sample', require('./components/sample/Sample.vue'));
Vue.component('leader',require('./components/leader/Leader.vue'));
Vue.component('role',require('./components/role/Role.vue'));
Vue.component('vtable',require('./components/Table.vue'));

const app = new Vue({
    el: '#app',
    store
});
