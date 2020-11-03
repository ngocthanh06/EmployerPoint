import Vue from 'vue';
import Vuex from 'vuex';
import adminAuth from './modules/admin/auth';
import admin from './modules/admin';

Vue.use(Vuex);
const store = new Vuex.Store({
  modules: {
    adminAuth,
    admin
  }
});

export default store;
