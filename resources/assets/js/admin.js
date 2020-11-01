
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import Vuex from 'vuex'
import VueRouter from 'vue-router';
import router from './routes/admin';
import store from './store/admin';
import App from './Admin.vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

require('./bootstrap');

Vue.use(ElementUI);
Vue.use(VueRouter)
Vue.use(Vuex)

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));


const admin = new Vue({
    el: '#admin',
    router,
    components: { App },
    store,
    template: '<App></App>'
});
