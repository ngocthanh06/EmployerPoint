import Vue from 'vue';
import Vuex from 'vuex';
import adminAuth from './modules/admin/auth';

Vue.use(Vuex);
const store = new Vuex.Store({
  modules: {
    adminAuth
  }
});

export default store;
