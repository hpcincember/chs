
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import swal from 'sweetalert2'
import LaravelValidator from 'vue-laravel-validator';
require('./bootstrap');

window.swal = swal
window.Vue = require('vue');
Vue.use(LaravelValidator);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('example', require('./components/Example.vue'));
Vue.component('leader',require('./components/Leader.vue'));
Vue.component('role',require('./components/role/Role.vue'));
Vue.component('vtable',require('./components/Table.vue'));

const app = new Vue({
    el: '#app'
});
